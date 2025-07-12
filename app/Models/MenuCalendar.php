<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCalendar extends Model
{
    use HasFactory;




    public function plans()
    {

        return $this->hasMany(MenuCalendarPlan::class, 'menuCalendarId');

    } // end function





    public function defaultPlans()
    {

        return $this->plans()?->where('isDefault', true);


    } // end function







    public function diets()
    {

        return $this->hasMany(MenuCalendarDiet::class, 'menuCalendarId');

    } // end function







    public function schedules()
    {

        return $this->hasMany(MenuCalendarSchedule::class, 'menuCalendarId');

    } // end function










    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------









    public function dietsInArray()
    {


        // 1: getDiets - loop
        $dietsInArray = [];



        foreach ($this?->diets()?->get() as $calendarDiet)
            array_push($dietsInArray, $calendarDiet->diet->name);



        return count($dietsInArray) > 0 ? $dietsInArray : ['No Diets'];


    } // end function







    // ------------------------------------------







    public function plansInArray()
    {


        // 1: getPlans - loop
        $plansInArray = [];



        foreach ($this?->plans()?->get() as $calendarPlan)
            array_push($plansInArray, $calendarPlan->plan->name);



        return count($plansInArray) > 0 ? $plansInArray : ['No Plans'];


    } // end function







    // ------------------------------------------







    public function scheduleByDate($date)
    {

        return $this->schedules()?->where('scheduleDate', $date)?->first();

    } // end function







} // end model
