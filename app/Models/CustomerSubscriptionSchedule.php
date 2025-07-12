<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionSchedule extends Model
{
    use HasFactory;




    public function subscription()
    {

        return $this->belongsTo(CustomerSubscription::class, 'customerSubscriptionId');

    } // end function




    public function delivery()
    {

        return $this->belongsTo(CustomerSubscriptionDelivery::class, 'customerSubscriptionDeliveryId');

    } // end function






    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function





    public function schedule()
    {

        return $this->belongsTo(MenuCalendarSchedule::class, 'menuCalendarScheduleId', 'id');

    } // end function







    public function meals()
    {

        return $this->hasMany(CustomerSubscriptionScheduleMeal::class, 'subscriptionScheduleId', 'id');

    } // end function









    // -----------------------------------------------------------
    // -----------------------------------------------------------









    public function mealTypesWithSize()
    {


        // :: init
        $mealTypesWithSize = [];



        // 1: getScheduleMeals
        $scheduleMeals = $this->meals ?? [];


        foreach ($scheduleMeals as $scheduleMeal) {

            array_push($mealTypesWithSize, "{$scheduleMeal?->mealType?->name} ({$scheduleMeal?->size?->name})");

        } // end loop







        // :: return
        return $mealTypesWithSize ?? [];


    } // end function








} // end model
