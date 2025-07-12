<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SectionForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $sectionGroupId;

    public $id, $desc, $nameURL, $imageFile;




    // :: helpers
    public $imageFileName;



} // end form
