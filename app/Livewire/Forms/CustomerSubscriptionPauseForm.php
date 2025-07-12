<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerSubscriptionPauseForm extends Form
{



   // :: variables
   #[Validate('required')]
   public $fromDate, $untilDate, $type, $customerId, $customerSubscriptionId;



   public $remarks, $pricePerDay, $totalPrice, $isActive, $manualUnPauseDate, $pauseDays;



} // end form
