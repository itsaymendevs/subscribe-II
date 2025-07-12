<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CheckoutForm extends Form
{

    public $type;
    public $cityId, $cityDeliveryTimeId, $deliveryTime, $cityDistrictId, $locationAddress, $apartment, $floor;
    public $firstName, $lastName, $branchId, $tableNumber, $branchTableId, $carPlateNumber, $email, $phone, $whatsapp;



    // 1.2: checkout
    public $totalQuantity, $totalPrice, $totalCheckoutPrice, $deliveryPrice, $VATPrice, $VATPercentage;


    // 1.3: promo - Esaad
    public $isPromoCodeApplied, $promoCode, $promoCodeDiscount, $promoCodeDiscountPrice;
    public $esaadCard, $isEsaadCardApplied, $esaadCardDiscount, $esaadCardDiscountPrice;
    public $paymentOption, $cashierOption, $isPaymentDone, $paymentURL, $paymentMethodId, $paymentToken;




    // 1.4: cart
    public $cart;
    public $removedParts, $remarks;
    public $customRemovedParts, $customRemovedIngredients, $customRemarks;

    public $id;





} // end form
