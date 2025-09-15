<?php

namespace App\Livewire\Subscribe\Customization\Components;

use App\Models\MealType;
use App\Models\Plan;
use App\Traits\HelperTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomizationPlanDetails extends Component
{


    use HelperTrait;


    // :: variables
    public $plan, $mealTypes, $meals;
    public $upcomingDates = [], $searchDate, $searchMealType;





    public function mount()
    {



        // 1: getUpcomingDates
        $currentDate = $this->getCurrentDate();

        for ($i = 0; $i < 6; $i++) {

            array_push($this->upcomingDates,
                date('Y-m-d', strtotime($currentDate." +{$i} day")));

        } // end loop



        // 2: initials
        $this->mealTypes = MealType::all();
        $this->searchMealType = MealType::first()->id;



    } // end function







    // ------------------------------------------------------------------




    #[On('planDetails')]
    public function planDetails($id)
    {

        // 1: getPlan
        $this->plan = Plan::find($id);


        // 2: initDate
        $this->searchDate = $this->upcomingDates[0];
        $this->getScheduleMeals();

    } // end function









    // ------------------------------------------------------------------







    public function getScheduleMeals()
    {

        // 1: calendarScheduleMeals
        $this->meals = $this->plan->defaultCalendarMeals($this->searchDate, $this->searchMealType);




    } // end function







    // ------------------------------------------------------------------





    public function changeDate($date)
    {


        // 1: getSearchDate + meals
        $this->searchDate = $date;
        $this->getScheduleMeals();


    } // end function







    // ------------------------------------------------------------------





    public function render()
    {

        return view('livewire.subscribe.customization.components.customization-plan-details');

    } // end function



} // end class
