<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StockItemPurchaseForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $purchaseID, $receivingDate, $vendorId;

    public $id, $PONumber, $remarks, $isConfirmed;


    // :: helpers
    public $vendorName;



} // end form
