<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MealForm extends Form
{



    // :: variables
    public $id, $typeId, $name, $nameURL, $generalName, $servingPrice, $validity, $category, $desc, $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile;

    public $cuisineId, $dietId;



    // :: relations
    public $tags = [];
    public $mealTypes = [];





    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName;

} // end form
