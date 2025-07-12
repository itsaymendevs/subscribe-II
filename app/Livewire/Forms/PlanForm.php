<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanForm extends Form
{



    // :: variables
    #[Validate('required')]
    public $name, $startingPrice, $desc, $longDesc;

    public $id, $nameURL, $tags = [], $sectionTitle, $caption, $videoURL, $colorPaletteId, $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile, $fifthImageFile, $sixthImageFile;


    public $extraImageFile, $secondExtraImageFile, $thirdExtraImageFile, $fourthExtraImageFile;






    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName, $fifthImageFileName, $sixthImageFileName;

    public $extraImageFileName, $secondExtraImageFileName, $thirdExtraImageFileName, $fourthExtraImageFileName;



    // :: relation
    public $points = [];


} // end form
