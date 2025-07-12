<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StripePaymentForm extends Form
{


   // :: STEP 5 - PAYMENT STRIPE
   #[Validate('required')]
   public $cardNumber, $cardCVV, $cardExpiry, $cardExpiryMonth, $cardExpiryYear, $cardHolder;

   public $paymentStatus, $paymentIntentId;




} // end class
