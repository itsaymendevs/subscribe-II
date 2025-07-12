<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscription extends Model
{
    use HasFactory;
    use HelperTrait;



    public function types()
    {

        return $this->hasMany(CustomerSubscriptionType::class, 'customerSubscriptionId');

    } // end function







    public function deliveries()
    {

        return $this->hasMany(CustomerSubscriptionDelivery::class, 'customerSubscriptionId');

    } // end function





    public function nextDelivery()
    {

        $nextDelivery = $this->deliveries()?->where('deliveryDate', '>=', $this->getCurrentDate())?->where('status', '!=', 'Canceled')?->first();


        return $nextDelivery ?? null;


    } // end function








    public function isNextDeliveryPaused()
    {

        $nextDelivery = $this->deliveries()?->where('deliveryDate', '>=', $this->getCurrentDate())?->where('status', '!=', 'Canceled')?->first();


        if ($nextDelivery) {


            return in_array($nextDelivery?->status, ['Skipped', 'Paused']) ? true : false;

        } else {


            return false;

        } // end if



    } // end function







    public function pauses()
    {

        return $this->hasMany(CustomerSubscriptionPause::class, 'customerSubscriptionId');

    } // end function





    public function extends()
    {

        return $this->hasMany(CustomerSubscriptionExtend::class, 'customerSubscriptionId');

    } // end function





    public function shortens()
    {

        return $this->hasMany(CustomerSubscriptionShorten::class, 'customerSubscriptionId');

    } // end function






    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function





    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function






    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function





    public function range()
    {

        return $this->belongsTo(PlanRange::class, 'planRangeId');

    } // end function






    public function calendar()
    {

        return $this->belongsTo(MenuCalendar::class, 'menuCalendarId');

    } // end function






    public function bag()
    {

        return $this->belongsTo(Bag::class, 'bagId');

    } // end function







    public function bagRefund()
    {
        return $this->hasOne(BagRefund::class, 'customerSubscriptionId');

    } // end function






    // --------------------------------------------------------








    public function unCollectedBags()
    {


        // 1: latestCollected - Delivery
        $latestCollectedDelivery = $this->deliveries()?->where('isBagCollected', 1)
                ?->where('deliveryDate', '<=', $this->getCurrentDate())
                ?->latest('id')?->first();




        // :: exists
        if ($latestCollectedDelivery) {


            return $unCollectedBags = $this->deliveries()
                    ?->where('deliveryDate', '>', $latestCollectedDelivery->deliveryDate)
                    ?->where('deliveryDate', '<=', $this->getCurrentDate())
                    ?->where('isBagCollected', 0)
                    ?->count();



        } else {


            return $unCollectedBags = $this->deliveries()
                    ?->where('deliveryDate', '<=', $this->getCurrentDate())
                    ?->where('isBagCollected', 0)
                    ?->count();


        } // end if





    } // end function










    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------







    public function pricePerDay()
    {



        // 1: totalCheckoutPrice - bagPrice
        $totalCheckoutPriceOnly = $this->totalCheckoutPrice - $this->bagPrice;


        // :: checkValidity
        $totalCheckoutPriceOnly < 0 ? $totalCheckoutPriceOnly = 0 : null;




        // 2: getPricePerDay
        $pricePerDay = $totalCheckoutPriceOnly / $this->planDays;




        // :: return
        return $pricePerDay ?? 0;




    } // end function










    public function typesInArray()
    {

        return $this->types()?->get()?->pluck('mealTypeId')?->toArray();

    } // end function















    public function upcomingDeliveries()
    {


        // 1: getDeliveries
        $upcomingDeliveries = $this->deliveries()?->where('deliveryDate', '>=', date('d-m-Y'))?->get() ?? [];



        return $upcomingDeliveries;


    } // end function













    public function completedDeliveries()
    {


        // 1: getDeliveries
        $completedDeliveries = $this->deliveries()?->where('status', 'Completed')?->get() ?? [];


        return $completedDeliveries;


    } // end function










    public function incompleteDeliveries()
    {


        // 1: getDeliveries
        $pendingDeliveries = $this->deliveries()?->where('status', '!=', 'Completed')?->get() ?? [];



        return $pendingDeliveries;


    } // end function










    public function canceledPauses()
    {

        return $this->pauses()?->where('isCanceled', true)->get() ?? [];

    } // end function





} // end model
