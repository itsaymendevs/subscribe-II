<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerAddressForm extends Form
{



   // :: variables
   #[Validate('required')]
   public $name, $cityId, $cityDistrictId, $deliveryTimeId, $locationAddress, $customerId;


   public $id, $apartment, $floor;

   public $deliveryDays = [];


} // end form
