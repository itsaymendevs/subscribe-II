<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StockItemPurchaseItemForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $quantity, $itemId, $stockItemPurchaseId;


    public $id, $type, $buyPrice, $unitId;



    // :: helpers
    public $unitName, $itemName;




} // end form

