<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PaymenntForm extends Form
{
    // :: PAYMENNT
    public $paymentReference, $paymentURL, $isPaymentDone = false, $validationMessage = 'Invalid Payment';




    // :: extra
    public $token;



} // end class
