<?php

namespace App\Traits;

use stdClass;


trait CalendarTrait
{


    use HelperTrait;


    protected function getWeeksOptions()
    {

        // :: root
        $weeks = [];
        $currentDate = $this->getCurrentDate();


        // 1: getPreviousWeeks - 3 weeks
        for ($i = 3; $i > 0; $i--)
            array_push($weeks, date('Y-m-d', strtotime($currentDate . '-' . $i . ' week')));





        // 1: getUpcomingWeeks - current + 4 weeks
        for ($i = 0; $i < 5; $i++)
            array_push($weeks, date('Y-m-d', strtotime($currentDate . '+' . $i . ' week')));


        return $weeks;


    } // end function








    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------








    protected function getWeekDates($currentDate)
    {


        // :: root
        $weekDates = [];


        // 1: getWeekDates
        for ($i = 0; $i < 7; $i++)
            array_push($weekDates, date('Y-m-d', strtotime($currentDate . '+' . $i . ' days')));



        return $weekDates;


    } // end function







} // end trait

