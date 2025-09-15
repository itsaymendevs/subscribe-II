<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    use HelperTrait;




    public function ranges()
    {

        return $this->hasMany(PlanRange::class, 'planId');

    } // end function





    public function category()
    {

        return $this->belongsTo(PlanCategory::class, 'planCategoryId');

    } // end function





    public function bundles()
    {

        return $this->hasMany(PlanBundle::class, 'planId');

    } // end function






    public function calendars()
    {

        return $this->hasMany(MenuCalendarPlan::class, 'planId');

    } // end function




    public function points()
    {

        return $this->hasMany(PlanPoint::class, 'planId');

    } // end function






    public function defaultCalendarRelation()
    {

        return $this->calendars()->where('isDefault', true);


    } // end function








    public function defaultCalendar()
    {

        return $this->calendars()->where('isDefault', true)?->first();


    } // end function








    public function defaultCalendarMeals($scheduleDate = null, $mealTypeId = null)
    {


        // 1: getDefaultCalendar
        $sampleMeals = [];
        $defaultCalendar = $this->defaultCalendar() ?? null;


        if ($defaultCalendar) {


            // 1.2: getMeals
            if ($mealTypeId) {

                $mealsIDs = $defaultCalendar?->calendar?->scheduleByDate($scheduleDate ?? $this->getCurrentDate())?->meals
                        ?->where('mealTypeId', $mealTypeId)?->pluck('mealId')?->toArray() ?? [];

            } else {


                $mealsIDs = $defaultCalendar?->calendar?->scheduleByDate($scheduleDate ?? $this->getCurrentDate())?->meals?->pluck('mealId')?->toArray() ?? [];

            } // end if



            $sampleMeals = Meal::whereIn('id', $mealsIDs ?? [])?->get();


        } // end if



        return $sampleMeals ?? [];


    } // end function







    public function tagsInArray()
    {

        // 1: getTags
        $tagsInArray = $this->tags ? explode('_', $this->tags) : [];

        return $tagsInArray ?? [];


    } // end function










    public function subscriptions()
    {

        return $this->hasMany(CustomerSubscription::class, 'planId');

    } // end function







    public function activeCustomers()
    {


        // 1: getSubscriptions - customers
        $subscriptions = $this->subscriptions()?->where('startDate', '<=', $this->getCurrentDate())
                ?->where('untilDate', '>=', $this->getCurrentDate())
                ?->get()?->pluck('customerId')?->toArray() ?? [];


        $customers = Customer::whereHas('subscriptions')?->whereIn('id', $subscriptions)?->get();



        // :: return
        return $customers;



    } // end function







} // end model
