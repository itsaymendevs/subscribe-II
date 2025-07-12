<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VendorItemForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $vendorId, $itemId, $sellPrice;

    public $id, $unitId;



    // :: helpers
    public $type, $unitName, $itemName;


} // end form
