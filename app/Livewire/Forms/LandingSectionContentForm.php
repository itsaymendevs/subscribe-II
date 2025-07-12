<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LandingSectionContentForm extends Form
{


    public $id, $subscriptionSectionId;

    public $title, $secondTitle, $thirdTitle, $fourthTitle, $fifthTitle;
    public $subtitle, $secondSubtitle, $thirdSubtitle, $fourthSubtitle, $fifthSubtitle;
    public $actionButton, $secondActionButton, $thirdActionButton;
    public $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile, $fifthImageFile;




    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName, $fifthImageFileName;




} // end form
