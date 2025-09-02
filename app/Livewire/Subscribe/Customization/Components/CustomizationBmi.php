<?php

namespace App\Livewire\Subscribe\Customization\Components;

use App\Traits\HelperTrait;
use Livewire\Component;

class CustomizationBmi extends Component
{


    use HelperTrait;
    public $option, $weight, $height, $age, $gender, $bmi, $bmiStatus, $showResult, $bmr;
    public $activityLevelOptions, $activityLevel;


    public function mount()
    {


        // :: init
        $this->age = 0;
        $this->weight = 0;
        $this->height = 0;
        $this->showResult = false;
        $this->option = "BMI";




        // 1.2: activityLevels
        $this->activityLevelOptions = [
            "Sedentary (little or no exercise)",
            "Lightly Active (light exercise 1-3 days/week)",
            "Moderately Active (moderate exercise 3-5 days/week)",
            "Very Active (hard exercise 6-7 days/week)",
            "Extra Active (very hard exercise & physical job or training twice per day)",
        ];


    } // end function





    // ------------------------------------------------------------




    public function changeGender($gender)
    {

        $this->gender = $gender;

    } // end function




    // ------------------------------------------------------------





    public function plus($variable)
    {


        // 1: increase
        if ($variable == 'weight') {

            $this->weight >= 0 ? $this->weight += 1 : $this->weight = 0;

        } elseif ($variable == 'age') {

            $this->age >= 0 ? $this->age += 1 : $this->age = 0;

        } elseif ($variable == 'height') {

            $this->height >= 0 ? $this->height += 1 : $this->height = 0;

        } // end if


    } // end function





    // ------------------------------------------------------------








    public function minus($variable)
    {


        // 1: decrease
        if ($variable == 'weight') {

            $this->weight > 0 ? $this->weight -= 1 : $this->weight = 0;

        } elseif ($variable == 'age') {

            $this->age > 0 ? $this->age -= 1 : $this->age = 0;

        } elseif ($variable == 'height') {

            $this->height > 0 ? $this->height -= 1 : $this->height = 0;

        } // end if


    } // end function





    // ------------------------------------------------------------






    public function calculate()
    {


        if ($this->weight && $this->height && $this->age && $this->gender) {



            // :: bmi
            $this->showResult = true;
            $this->bmi = round($this->weight / (($this->height / 100) * ($this->height / 100)), precision: 1);



            // 1.2: checkStatus
            if ($this->bmi < 18.5) {

                $this->bmiStatus = "Underweight";

            } elseif ($this->bmi >= 18.5 && $this->bmi < 25) {

                $this->bmiStatus = "Normal Weight";

            } elseif ($this->bmi >= 25 && $this->bmi < 30) {

                $this->bmiStatus = "Overweight";

            } else {

                $this->bmiStatus = "Obese";

            } // end if





            // -------------------------------------------------------------------
            // -------------------------------------------------------------------




            // 1.3: checkGender
            if ($this->gender == 'Male') {

                $convertedAge = $this->age * 5;
                $convertedWeight = $this->weight * 10;
                $convertedHeight = $this->height * 6.25;

                $this->bmr = round($convertedWeight + $convertedHeight - $convertedAge + 5);


            } else {

                $convertedAge = $this->age * 5;
                $convertedWeight = $this->weight * 10;
                $convertedHeight = $this->height * 4.7;

                $this->bmr = round($convertedWeight + $convertedHeight - $convertedAge - 161);


            } // end if







        } else {

            $this->makeAlert('info', 'Kindly fill your information');

        } // end if



    } // end function








    // ------------------------------------------------------------






    public function calculateAgain()
    {



        // :: reset
        $this->age = 0;
        $this->weight = 0;
        $this->height = 0;
        $this->bmi = null;
        $this->bmr = null;
        $this->bmiStatus = null;
        $this->gender = null;
        $this->showResult = false;



    } // end function








    // ------------------------------------------------------------







    public function render()
    {
        return view('livewire.subscribe.customization.components.customization-bmi');

    } // end function


} // end class
