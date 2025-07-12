<?php

namespace App\Models;

use App\Traits\HelperTrait;
use App\Traits\MenuCalendarTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use stdClass;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use MenuCalendarTrait;
    use HelperTrait;





    public function wallet()
    {

        return $this->hasOne(CustomerWallet::class, 'customerId');

    } // end function





    public function deposits()
    {

        return $this->hasMany(CustomerWalletDeposit::class, 'customerId');

    } // end function








    public function subscriptions()
    {

        return $this->hasMany(CustomerSubscription::class, 'customerId');

    } // end function








    public function subscriptionTypes()
    {

        return $this->hasMany(CustomerSubscriptionType::class, 'customerId');

    } // end function






    // ---------------------------------------------------
    // ---------------------------------------------------





    public function latestSubscription()
    {

        return $this->subscriptions()->latest('id')->first();

    } // end function








    public function currentSubscription()
    {



        // 1: getCurrent
        $currentSubscription = $this->subscriptions()?->where('untilDate', '>=', $this->getCurrentDate())?->first();




        // :: extra: getLatest if empty
        if (empty($currentSubscription))
            $currentSubscription = $this->latestSubscription();



        return $currentSubscription;


    } // end function








    public function activeSubscriptions()
    {


        $activeSubscriptions = $this->subscriptions()?->where('untilDate', '>=', $this->getCurrentDate())?->get();


        return $activeSubscriptions;


    } // end function









    public function hasUpcomingSubscription()
    {



        // :: determine hasUpcomingSubscription
        $hasUpcomingSubscription = ($this->currentSubscription()?->id != $this->latestSubscription()?->id) ? true : false;


        return $hasUpcomingSubscription;


    } // end function










    // ---------------------------------------------------
    // ---------------------------------------------------










    public function addresses()
    {

        return $this->hasMany(CustomerAddress::class, 'customerId');

    } // end function





    public function latestAddress()
    {

        return $this->addresses()?->latest('id')?->first();


    } // end function









    public function deliveryDays()
    {

        return $this->hasMany(CustomerDeliveryDay::class, 'customerId');

    } // end function








    public function deliveries()
    {

        return $this->hasMany(CustomerSubscriptionDelivery::class, 'customerId');

    } // end function






    public function excludes()
    {

        return $this->hasMany(CustomerExclude::class, 'customerId');

    } // end function







    public function allergies()
    {

        return $this->hasMany(CustomerAllergy::class, 'customerId');

    } // end function











    // --------------------------------------------------------
    // --------------------------------------------------------
    // --------------------------------------------------------
    // --------------------------------------------------------






    public function fullName()
    {

        return $this->firstName.' '.$this->lastName;

    } // end function







    public function fullEmail()
    {

        return $this->email.$this->emailProvider;

    } // end function







    public function fullPhone()
    {

        return $this->phoneKey.' '.$this->phone;

    } // end function






    public function fullWhatsapp()
    {

        return $this->whatsappKey.' '.$this->whatsapp;

    } // end function








    // --------------------------------------------------------










    public function deliveryWeekDays()
    {


        // 1: dependencies
        $deliveryWeekDays = [];





        // 1: getDeliveryDays
        $deliveryDays = $this->deliveryDays()?->pluck('weekDay')?->toArray() ?? [];





        // 1.2: loop - deliveryDays
        foreach (array_unique($deliveryDays) as $deliveryDay)
            array_push($deliveryWeekDays, $deliveryDay);




        // :: return
        return $deliveryWeekDays;



    } // end function








    // --------------------------------------------------------








    public function addressByDay($date)
    {


        // 1: getWeekDay
        $currentWeekDay = date('l', strtotime($date));



        // 1.2: loop - deliveryDays
        $deliveryDay = $this->deliveryDays()->where('weekDay', $currentWeekDay)?->first() ?? null;



        // :: return
        return $deliveryDay ? $deliveryDay?->customerAddress : null;



    } // end function
















    // --------------------------------------------------------








    public function deliveryTimeByDay($date)
    {


        // 1: getWeekDay
        $currentWeekDay = date('l', strtotime($date));



        // 1.2: loop - deliveryDays
        $deliveryDay = $this->deliveryDays()->where('weekDay', $currentWeekDay)?->first() ?? null;




        // :: return
        return $deliveryDay ? $deliveryDay?->customerAddress?->deliveryTime ?? null : null;




    } // end function












    // --------------------------------------------------------








    public function checkMealCompatibility($id)
    {




        // 1: checkValidity
        $combinedArray = $this->checkMealValidityFromCustomer($id, $this->id);



        // 1.2: Allergies - Excludes
        $excludes = Exclude::whereIn('id', $combinedArray['excludes'])?->get();
        $allergies = Allergy::whereIn('id', $combinedArray['allergies'])?->get();



        // 1.3: allergyIngredients - excludeIngredient
        $excludeIngredients = Ingredient::whereIn('id', $combinedArray['excludeIngredients'])?->get();
        $allergyIngredients = Ingredient::whereIn('id', $combinedArray['allergyIngredients'])?->get();









        // :: return
        $content = new stdClass();


        $content->excludes = $excludes;
        $content->allergies = $allergies;
        $content->excludeIngredients = $excludeIngredients;
        $content->allergyIngredients = $allergyIngredients;



        return $content;



    } // end function







} // end model
