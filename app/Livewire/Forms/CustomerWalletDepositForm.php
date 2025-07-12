<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerWalletDepositForm extends Form
{



   // :: variables
   #[Validate('required')]
   public $customerId, $walletId, $amount, $remarks, $depositDate;




} // end form
