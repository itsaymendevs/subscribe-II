<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;



    public function tags()
    {

        return $this->hasMany(MealTag::class, 'mealId');

    } // end function








    public function tagsInArray()
    {


        // 1: getTags - loop
        $tagsInArray = [];
        $tags = $this->tags()->get();



        foreach ($tags as $tag) {

            array_push($tagsInArray, $tag->tag->name);

        } // end loop


        return $tagsInArray;


    } // end function






    // ------------------------------------------------------------------
    // ------------------------------------------------------------------







    public function instructions()
    {

        return $this->hasMany(MealInstruction::class, 'mealId');

    } // end function






    public function cuisine()
    {

        return $this->belongsTo(Cuisine::class, 'cuisineId');

    } // end function









    public function menus()
    {

        return $this->hasMany(MealMenu::class, 'mealId');

    } // end function







    public function subMenus()
    {

        return $this->hasMany(MealMenuSub::class, 'mealId');

    } // end function







    public function servingInstructions()
    {

        return $this->hasMany(MealServingInstruction::class, 'mealId');

    } // end function






    public function serving()
    {

        return $this->hasOne(MealServing::class, 'mealId');

    } // end function






    public function sizes()
    {

        return $this->hasMany(MealSize::class, 'mealId');

    } // end function







    // ------------------------------------------------------------------
    // ------------------------------------------------------------------






    public function sizesByMenu($menu)
    {

        // 1: dependencies
        $menu = Menu::where('nameURL', $menu)->first();




        // 1.2: getMenuSizes
        $menuSizes = MenuSize::where('menuId', $menu->id)
            ->where('typeId', $this->typeId)->get()?->pluck('sizeId')?->toArray() ?? [];




        return $this->hasMany(MealSize::class, 'mealId')->whereIn('sizeId', $menuSizes);




    } // end function






    // ------------------------------------------------------------------
    // ------------------------------------------------------------------







    public function certainSize($sizeId)
    {

        return $this->sizes()?->where('sizeId', $sizeId)?->first() ?? null;

    } // end function







    public function diet()
    {

        return $this->belongsTo(Diet::class, 'dietId');

    } // end function





    public function type()
    {

        return $this->belongsTo(Type::class, 'typeId');

    } // end function







    public function container()
    {

        return $this->belongsTo(Container::class, 'containerId');

    } // end function








    public function label()
    {

        return $this->belongsTo(Label::class, 'labelId');

    } // end function







    public function types()
    {

        return $this->hasMany(MealAvailableType::class, 'mealId');

    } // end function







    public function typesInArray()
    {


        // 1: getTypes - loop
        $typesInArray = [];
        $availableTypes = $this->types()->get();



        foreach ($availableTypes as $availableType) {

            array_push($typesInArray, $availableType->mealType->name);

        } // end loop


        return $typesInArray;


    } // end function














    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------







    public function ingredients()
    {

        return $this->hasMany(MealIngredient::class, 'mealId');

    } // end function







    public function parts()
    {

        return $this->hasMany(MealPart::class, 'mealId');

    } // end function













    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------










    public function inMenu($id)
    {


        // 1: dependencies
        $isIncluded = $this->menus()?->where('menuId', $id)?->count() ?? 0;


        return $isIncluded > 0 ? true : false;


    } // end function








    // ------------------------------------------
    // ------------------------------------------








    public function inSubMenu($id)
    {


        // 1: dependencies
        $isIncluded = $this->subMenus()?->where('menuSubId', $id)?->count() ?? 0;


        return $isIncluded > 0 ? true : false;


    } // end function









    // ------------------------------------------
    // ------------------------------------------








    public function instructionsInArray()
    {


        // 1: get instances
        $instructionsInArray = $this->instructions()?->pluck('content')?->toArray() ?? [];

        return $instructionsInArray;


    } // end function







    // ------------------------------------------
    // ------------------------------------------








    public function servingInstructionsInArray()
    {


        // :: root
        $servingInstructionsInArray = [];




        // 1: getMealServingInstructions
        $mealServingInstructions = $this->servingInstructions()?->where('isActive', true)?->pluck('servingInstructionId')?->toArray() ?? [];




        // 1.2: getServingInstructions
        $servingInstructionsInArray = ServingInstruction::whereIn('id', $mealServingInstructions)?->get()?->pluck('name')?->toArray() ?? [];




        return $servingInstructionsInArray;




    } // end function










    // ------------------------------------------
    // ------------------------------------------








    public function totalGrams()
    {


        // :: root
        $totalGrams = 0;



        $totalGrams += $this?->ingredients?->where('isDefault', 1)?->sum('amount') ?? 0;
        $totalGrams += $this?->parts?->where('isDefault', 1)?->sum('amount') ?? 0;




        return $totalGrams;


    } // end function













    // ------------------------------------------
    // ------------------------------------------








    public function totalAfterCookGrams()
    {


        // :: root
        $totalGrams = 0;
        $ingredients = $this->ingredients()?->get();





        // 1: ingredients - withConversion
        foreach ($ingredients?->where('isDefault', 1) ?? [] as $mealIngredient) {


            $conversionValue = ConversionIngredient::where('ingredientId', $mealIngredient?->ingredientId)
                ->where('cookingTypeId', $mealIngredient?->cookingTypeId)?->first()?->conversionValue ?? 1;


            $totalGrams += ($mealIngredient?->amount ?? 0) * $conversionValue;


        } // end loop









        // 2: parts
        $totalGrams += $this?->parts?->where('isDefault', 1)?->sum('amount') ?? 0;






        return $totalGrams;


    } // end function










    // ------------------------------------------
    // ------------------------------------------










    public function partsInArray()
    {


        // :: dependencies
        $parts = [];
        $mealSize = $this->sizes?->first();



        if ($mealSize) {


            // 1: ingredients
            $mealIngredients = $mealSize?->ingredients()?->where('isDefault', 1)?->get();

            foreach ($mealIngredients ?? [] as $mealIngredient)
                $mealIngredient?->ingredient ? array_push($parts, $mealIngredient->ingredient->name) : null;





            // 2: parts
            $mealParts = $mealSize?->parts()?->where('isDefault', 1)?->get();

            foreach ($mealParts?->unique('mealId') as $mealPart)
                $mealPart?->part ? array_push($parts, $mealPart->part->name) : null;



        } // end loop





        return count($parts) > 0 ? $parts : ['List is empty'];



    } // end function













    // ------------------------------------------
    // ------------------------------------------










    public function allergiesAndExcludesInArray($allergies = [], $excludes = [], $allergyIngredients = [], $excludeIngredients = [])
    {




        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get() ?? [];



        foreach ($mealIngredients?->where('isDefault', 1) ?? [] as $mealIngredient) {

            if ($mealIngredient->ingredient && $mealIngredient->ingredient->excludes) {

                array_push($excludes, ...$mealIngredient->ingredient->excludesInArray());
                array_push($excludeIngredients, $mealIngredient->ingredient->id);

            } // end if




            if ($mealIngredient->ingredient && $mealIngredient->ingredient->allergies) {

                array_push($allergies, ...$mealIngredient->ingredient->allergiesInArray());
                array_push($allergyIngredients, $mealIngredient->ingredient->id);

            } // end if


        }  // end loop







        // -----------------------------------------
        // -----------------------------------------







        // 2: parts
        $mealParts = $this->parts()?->get() ?? [];


        foreach ($mealParts?->where('isDefault', 1) ?? [] as $mealPart) {


            // :: recursion
            $combinedArray = $mealPart?->part?->allergiesAndExcludesInArray($allergies, $excludes, $allergyIngredients, $excludeIngredients);



            // :: merge
            $excludes = array_merge($excludes, $combinedArray['excludes'] ?? []);
            $allergies = array_merge($allergies, $combinedArray['allergies'] ?? []);

            $allergyIngredients = array_merge($allergyIngredients, $combinedArray['allergyIngredients'] ?? []);
            $excludeIngredients = array_merge($excludeIngredients, $combinedArray['excludeIngredients'] ?? []);



        } // end loop









        return ['allergies' => array_unique($allergies ?? []),
            'excludes' => array_unique($excludes ?? []),
            'allergyIngredients' => array_unique($allergyIngredients ?? []),
            'excludeIngredients' => array_unique($excludeIngredients ?? [])];




    } // end function














    // ------------------------------------------
    // ------------------------------------------










    public function allergiesInArray($allergies = [], $allergyIngredients = [])
    {




        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get() ?? [];



        foreach ($mealIngredients?->where('isDefault', 1) ?? [] as $mealIngredient) {


            if ($mealIngredient->ingredient && $mealIngredient->ingredient->allergies) {

                array_push($allergies, ...$mealIngredient->ingredient->allergiesInArray());
                array_push($allergyIngredients, $mealIngredient->ingredient->id);

            } // end if


        }  // end loop







        // -----------------------------------------
        // -----------------------------------------







        // 2: parts
        $mealParts = $this->parts()?->get() ?? [];


        foreach ($mealParts?->where('isDefault', 1) ?? [] as $mealPart) {


            // :: recursion
            $combinedArray = $mealPart?->part?->allergiesInArray($allergies, $allergyIngredients);



            // :: merge
            $allergies = array_merge($allergies, $combinedArray['allergies'] ?? []);
            $allergyIngredients = array_merge($allergyIngredients, $combinedArray['allergyIngredients'] ?? []);



        } // end loop




        return ['allergies' => array_unique($allergies ?? []),
            'allergyIngredients' => array_unique($allergyIngredients ?? []),
        ];



    } // end function
















    // ------------------------------------------
    // ------------------------------------------










    public function allergiesByNameInArray($allergies = [], $allergyIngredients = [])
    {




        // 1: ingredients
        $mealIngredients = $this->ingredients()?->get() ?? [];



        foreach ($mealIngredients?->where('isDefault', 1) ?? [] as $mealIngredient) {


            if ($mealIngredient->ingredient && $mealIngredient->ingredient->allergies) {

                array_push($allergies, ...$mealIngredient->ingredient->allergiesInArray());
                array_push($allergyIngredients, $mealIngredient->ingredient->id);

            } // end if


        }  // end loop







        // -----------------------------------------
        // -----------------------------------------







        // 2: parts
        $mealParts = $this->parts()?->get() ?? [];


        foreach ($mealParts?->where('isDefault', 1) ?? [] as $mealPart) {


            // :: recursion
            $combinedArray = $mealPart?->part?->allergiesInArray($allergies, $allergyIngredients);



            // :: merge
            $allergies = array_merge($allergies, $combinedArray['allergies'] ?? []);
            $allergyIngredients = array_merge($allergyIngredients, $combinedArray['allergyIngredients'] ?? []);



        } // end loop








        // -----------------------------------------
        // -----------------------------------------





        // 3: getNames
        $allergies = Allergy::whereIn('id', $allergies ?? [])?->pluck('name')?->toArray() ?? [];



        return ['allergies' => $allergies ?? [],
            'allergyIngredients' => array_unique($allergyIngredients ?? []),
        ];



    } // end function










} // end model
