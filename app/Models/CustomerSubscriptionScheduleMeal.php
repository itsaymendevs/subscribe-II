<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionScheduleMeal extends Model
{
    use HasFactory;




    public function subscription()
    {

        return $this->belongsTo(CustomerSubscription::class, 'customerSubscriptionId');

    } // end function





    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function







    public function macro()
    {
        return $this->hasOne(CustomerSubscriptionScheduleMealMacro::class, 'subscriptionScheduleMealId');

    } // end function






    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function







    public function schedule()
    {

        return $this->belongsTo(CustomerSubscriptionSchedule::class, 'subscriptionScheduleId');

    } // end function




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function






    public function mealType()
    {

        return $this->belongsTo(MealType::class, 'mealTypeId');

    } // end function








    public function size()
    {

        return $this->belongsTo(Size::class, 'sizeId');

    } // end function












    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------










    public function mealSize()
    {



        // 1: getMealSize
        $mealSize = MealSize::where('mealId', $this?->mealId)
            ->where('sizeId', $this?->sizeId)?->first();



        return $mealSize;

    } // end function










    // -----------------------------------------------------------










    public function customerExcludes()
    {


        // 1: getMealExcludes
        $combine = $this->meal?->allergiesAndExcludesInArray();



        // 1: getCustomerExcludes
        $customerExcludes = $this->customer()?->first()?->excludes?->pluck('excludeId')?->toArray() ?? [];





        // TODO: --
        // to be continue ..



        return $customerExcludes;





    } // end function










    // -----------------------------------------------------------












    public function mealCheckExcludeCustomers($scheduleMealsByMeal)
    {





        // 1: ingredients & Parts



        // 1: getMealExcludes - allergies
        $combine = $scheduleMealsByMeal->first()?->meal?->allergiesAndExcludesInArray();





        // 1.2: getHasExcludes
        $hasCustomerExcludes = CustomerExclude::whereIn('customerId', $scheduleMealsByMeal?->pluck('customerId')?->toArray() ?? [])?->whereIn('excludeId', $combine['excludes'])?->count() ?? 0;





        if ($hasCustomerExcludes > 0)
            return true;








        return false;




    } // end function
















    // -----------------------------------------------------------










    public function mealCustomerExcludes($scheduleMealsByMeal)
    {



        // 1: ingredients & Parts





        // 1: getMealExcludes - allergies
        $combine = $scheduleMealsByMeal->first()?->meal?->allergiesAndExcludesInArray();





        // 1.2: get excludeCustomers - excludeIngredients
        $excludeCustomers = CustomerExclude::whereIn('customerId', $scheduleMealsByMeal?->pluck('customerId')?->toArray() ?? [])?->whereIn('excludeId', $combine['excludes'])?->get();






        // ---------------------------------------
        // ---------------------------------------







        // 2: customerExcludes
        $customerExcludes = [];




        // 2.1: loop - excludeCustomers
        foreach ($excludeCustomers ?? [] as $excludeCustomer) {

            $customerExcludes[$excludeCustomer->customerId] = array_merge($customerExcludes[$excludeCustomer->customerId] ?? [], $excludeCustomer?->exclude?->ingredientsList?->whereIn('ingredientId', $combine['excludeIngredients'])?->pluck('ingredientId')?->toArray() ?? []);


        } // end loop







        return $customerExcludes;





    } // end function










} // end modal
