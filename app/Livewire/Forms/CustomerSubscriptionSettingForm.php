<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerSubscriptionSettingForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $VAT, $minimumDeliveryDays, $isPaymentSkipped, $paymentMethodId, $pauseRestriction, $unPauseRestriction, $skipRestriction, $shortenRestriction, $changeCalendarRestriction, $mealSelectionRestriction, $hasPlanCart, $hasPlanCustomization;


    public $hasDeliveryCharge;



} // end form
