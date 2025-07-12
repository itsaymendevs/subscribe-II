<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StockPurchaseForm extends Form
{


   // :: variables
   #[Validate('required')]
   public $purchaseID, $receivingDate, $supplierId;

   public $id, $PONumber, $remarks, $isConfirmed;


   // :: helpers
   public $supplierName;



} // end form
