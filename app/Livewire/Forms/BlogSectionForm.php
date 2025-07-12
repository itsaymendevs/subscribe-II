<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogSectionForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $title, $content, $type, $blogId;

    public $id, $imageFile, $secondImageFile, $thirdImageFile, $fourthImageFile;




    // :: helpers
    public $imageFileName, $secondImageFileName, $thirdImageFileName, $fourthImageFileName;




} // end form
