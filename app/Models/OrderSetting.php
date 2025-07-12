<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSetting extends Model
{
    use HasFactory;





    public function checkStage($timelapse)
    {

        // 1: getMinutes
        $minutes = $this->preparationTimer ?? 0;



        // 1.2: threshold
        $stageOnePercentage = $this->preparationStageOne / 100;
        $stageTwoPercentage = $this->preparationStageTwo / 100;

        $thresholdOne = $minutes * $stageOnePercentage;
        $thresholdTwo = $minutes * $stageTwoPercentage;


        if ($timelapse <= $thresholdOne) {

            return "stage-one";

        } elseif ($timelapse <= $thresholdTwo) {

            return "stage-two";

        } else {

            return "stage-three";

        } // end if




    } // end function


} // end class
