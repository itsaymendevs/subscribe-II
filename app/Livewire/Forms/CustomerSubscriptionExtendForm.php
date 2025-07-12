<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerSubscriptionExtendForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $fromDate, $extendDays, $reason, $customerId, $customerSubscriptionId;



    public $remarks, $pricePerDay, $totalPrice, $untilDate, $imageFile;


    // :: helper
    public $imageFileName;




} // end form
