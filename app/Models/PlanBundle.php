<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class PlanBundle extends Model
{
    use HasFactory;



    public function types()
    {

        return $this->hasMany(PlanBundleType::class, 'planBundleId');

    } // end function



    public function days()
    {

        return $this->hasMany(PlanBundleDay::class, 'planBundleId');

    } // end function






    public function sizes()
    {

        return $this->hasMany(PlanBundleSize::class, 'planBundleId');

    } // end function




    public function rangesByPrice()
    {

        return $this->hasMany(PlanBundleRangePrice::class, 'planBundleId');

    } // end function



    public function ranges()
    {

        return $this->hasMany(PlanBundleRange::class, 'planBundleId');

    } // end function







    public function planRanges()
    {

        // 1: getPlanBundleRanges
        $planBundleRanges = $this->ranges()?->get()?->pluck('planRangeId')?->toArray() ?? [];



        // 1.2: getPlanRanges
        $planRanges = PlanRange::whereIn('id', $planBundleRanges)?->get();

        return $planRanges;



    } // end function








    public function activePlanRanges()
    {

        // 1: getPlanBundleRanges
        $planBundleRanges = $this->ranges()?->where('isForWebsite', true)?->get()?->pluck('planRangeId')?->toArray() ?? [];



        // 1.2: getPlanRanges
        $planRanges = PlanRange::where('isForWebsite', true)?->whereIn('id', $planBundleRanges)?->get();

        return $planRanges;



    } // end function








    public function subscriptions()
    {

        return $this->hasMany(CustomerSubscription::class, 'planBundleId');

    } // end function







    // -----------------------------------------------------------
    // -----------------------------------------------------------








    public function typesInArray()
    {


        // 1: getTypes - typeInArray
        $typesInArray = [];
        $types = $this->types()->get();



        // :: loop - types
        foreach ($types->groupBy('typeId') as $commonType => $typesByType) {


            // 1.2: quantity > 0
            if ($typesByType->sum('quantity') > 0) {


                // 1.3: getTypeName
                $typeName = $typesByType->first()->type->name == 'Recipe' ? 'Meal' : $typesByType->first()->type->name;






                // 1.4: plural
                if ($typesByType->sum('quantity') > 1) {

                    array_push($typesInArray, "{$typesByType->sum('quantity')} {$typeName}s");

                } else {

                    array_push($typesInArray, "{$typesByType->sum('quantity')} {$typeName}");

                } // end if


            } // end if


        } // end loop - types







        return $typesInArray;


    } // end function









    // -----------------------------------------------------------
    // -----------------------------------------------------------








    public function typesInObject()
    {


        // 1: getTypes - typeInArray
        $typesInArray = [];
        $types = $this->types()->get();



        // :: loop - types
        foreach ($types->groupBy('typeId') as $commonType => $typesByType) {


            // 1.2: quantity > 0
            if ($typesByType->sum('quantity') > 0) {


                // 1.3: getTypeName
                $typeName = strtolower($typesByType->first()->type->name == 'Recipe' ? 'meal' : $typesByType->first()->type->name);






                // 1.4: plural
                if ($typesByType->sum('quantity') > 1) {

                    $typesInArray[$typeName] = "{$typesByType->sum('quantity')} {$typeName}s";

                } else {

                    $typesInArray[$typeName] = "{$typesByType->sum('quantity')} {$typeName}";

                } // end if


            } // end if


        } // end loop - types






        return $typesInArray;


    } // end function











    // -----------------------------------------------------------
    // -----------------------------------------------------------








    public function typesInObjectForCheckout()
    {


        // 1: getTypes - typeInArray
        $typesInArray = [];
        $types = $this->types()->get();



        // :: loop - types
        foreach ($types->groupBy('typeId') as $commonType => $typesByType) {


            // 1.2: quantity > 0
            if ($typesByType->sum('quantity') > 0) {


                // 1.3: getTypeName
                $typeName = strtolower($typesByType->first()->type->name == 'Recipe' ? 'meal' : $typesByType->first()->type->name);






                // 1.4: plural
                $typeName = "{$typeName}s";
                $typesInArray[$typeName] = "{$typesByType->sum('quantity')}";


            } // end if


        } // end loop - types







        return $typesInArray;


    } // end function







    // -----------------------------------------------------------
    // -----------------------------------------------------------








    public function typesPlusMealTypesInObjectForCheckout()
    {


        // 1: getTypes - typeInArray
        $typesInArray = [];
        $types = $this->types()->get();



        // :: loop - types
        foreach ($types->groupBy('typeId') as $commonType => $typesByType) {


            // 1.2: quantity > 0
            if ($typesByType->sum('quantity') > 0) {



                // 1.3: recipes or others
                if ($typesByType->first()->type->name == 'Recipe') {


                    foreach ($typesByType->groupBy('mealTypeId') as $commonMealType => $typesByMealType) {

                        $typeName = strtolower($typesByMealType->first()->mealType?->name);
                        $typeName = "{$typeName}";
                        $typesInArray[$typeName] = "{$typesByMealType->sum('quantity')}";


                    } // end loop - mealTypes


                } else {


                    // 1.3: others
                    $typeName = strtolower($typesByType->first()->type->name);
                    $typeName = "{$typeName}";
                    $typesInArray[$typeName] = "{$typesByType->sum('quantity')}";


                } // end if


            } // end if


        } // end loop - types







        return $typesInArray;


    } // end function






} // end model
