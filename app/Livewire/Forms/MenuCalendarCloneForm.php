<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MenuCalendarCloneForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $menuCalendarId, $fromDate, $cloneFromDate, $cloneUntilDate;


} // end form

