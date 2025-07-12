<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SubscribeSectionContentForm extends Form
{


    public $id, $subscribeSectionId;

    public $title, $secondTitle, $thirdTitle, $fourthTitle, $fifthTitle;
    public $subtitle, $secondSubtitle, $thirdSubtitle, $fourthSubtitle, $fifthSubtitle;
    public $actionButton, $secondActionButton, $thirdActionButton;
    public $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile, $fifthImageFile;




    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName, $fifthImageFileName;



} // end form
