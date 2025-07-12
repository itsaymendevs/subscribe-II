<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SubscriptionForm extends Form
{



    // :: FLAGS
    public $isExistingCustomer = false;
    public $isManualExistingCustomer = false;





    // --------------------------------------------------






    // :: STEP 1
    public $phone, $email, $fullEmail, $name, $firstName, $lastName, $whatsapp, $gender, $planId, $password;
    public $phoneKey, $emailProvider, $whatsappKey;
    public $existingFullEmail, $existingPassword;

    public $id;




    // --------------------------------------------------





    // :: STEP 2
    public $planBundleId, $planRangeId, $planBundleRangeId, $planDays, $planMeals, $startDate, $initStartDate;


    public $planBundleTypes = [], $planBundleSizes = [], $planBundleCalories = [], $planBundlePrices = [], $planBundleDays = [];


    // :: helpers
    public $planBundleRangePricePerDay, $totalPlanBundleRangePrice, $planBundleRangeDiscountPrice, $planBundleRangeAdjustmentPrice, $planPrice;

    public $planBundleTypesInArray;







    // --------------------------------------------------






    // :: STEP 3
    public $bag, $bagPrice, $deliveryPrice, $tax, $taxPrice;


    public $hasAllergy, $hasExclude, $allergyLists = [], $excludeLists = [];



    // :: helpers
    public $bagImageFile;




    // --------------------------------------------------






    // :: STEP 4
    public $cityId, $cityDistrictId, $cityDeliveryTimeId, $locationAddress, $apartment, $floor;
    public $latitude, $longitude;



    public $deliveryDays = [];










    // --------------------------------------------------






    // :: STEP 5
    public $promoCode, $promoCodeDiscountPrice;
    public $referral, $referralDiscountPrice;

    public $totalPrice;
    public $totalCheckoutPrice;

    public $paymentMethodId, $isPaymentDone = false;


    // :: FOR STRIPE
    public $stripeSecret;







    // ---------------------------
    // ---------------------------
    // ---------------------------




    // :: STEP 5 - Existing
    public $useWallet = false, $walletDiscountPrice;
    public $acceptTerms = false;







} // end form
