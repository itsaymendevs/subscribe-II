<?php

namespace App\Livewire\Subscribe;

use App\Livewire\Forms\PaymenntForm;
use App\Livewire\Forms\SubscriptionForm;
use App\Models\Allergy;
use App\Models\Bag;
use App\Models\City;
use App\Models\CityHoliday;
use App\Models\CountryCode;
use App\Models\Customer;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Exclude;
use App\Models\MealType;
use App\Models\Plan;
use App\Models\PlanBundle;
use App\Models\PlanBundleDay;
use App\Models\PlanBundleRange;
use App\Models\PlanCategory;
use App\Models\PromoCode;
use App\Models\PromoCodePlan;
use App\Models\Size;
use App\Models\Type;
use App\Traits\HelperTrait;
use App\Traits\PaymenntLocalTrait;
use App\Traits\PaymenntTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;


class Customization extends Component
{


    use HelperTrait;
    use PaymenntTrait;
    use PaymenntLocalTrait;



    // :: variables
    public SubscriptionForm $instance;
    public PaymenntForm $payment;

    public $portalSection;
    public $customerEmail;
    public $plans, $planCategories, $planBundles, $planBundleRanges, $planBundleDays;
    public $pickedPlan, $pickedPlanBundle, $pickedPlanBundleRange;

    public $requiredTypes = [], $requiredTypeKeys = [];
    public $minimumDeliveryDays, $weekDays, $holidays;


    // :: dependencies
    public $sampleMeals, $hasOptionalBag, $bag;



    // :: PART 2
    public $plan, $cities, $countryCodes, $district, $paymentMethod, $subscriptionSettings;
    public $customerWallet;
    public $isProcessing = false, $policy = false;
    public $captchaToken;






    public function mount($nameURL = null)
    {




        // :: checkReToken
        if (session('reToken')) {



            // 1: checkReToken
            $reToken = session('reToken');
            $customer = Customer::where('reToken', $reToken)?->latest()?->first() ?? null;




            // 1.2: continue
            if ($customer) {


                // 1.3: makeSession - refresh
                $this->tokenCustomer($customer);
                Session::put('logged-customer', $this->instance);

            } // end if




        } // end if






        // ------------------------------------------------
        // ------------------------------------------------





        // :: getExitingSession
        if (session('logged-customer')) {

            $this->instance = session('logged-customer');
            $this->customerEmail = 'valid';
            Session::flash('hide-login', $this->instance->firstName);

        } // end if








        // ------------------------------------------------
        // ------------------------------------------------







        // 1: getPlans - settings
        $this->planCategories = PlanCategory::whereHas('plans')->get();
        $settings = CustomerSubscriptionSetting::first();

        $this->plans = Plan::whereHas('ranges')
            ->whereHas('bundles')
            ->whereHas('defaultCalendarRelation')
            ->where('isForWebsite', true)
            ->get();






        // 1.2: getPickedPlan
        if ($nameURL) {

            $this->pickedPlan = Plan::where('nameURL', $nameURL)?->first();



            // :: redirectAgain
            if (! $this->pickedPlan) {

                $this->pickedPlan = Plan::whereNotNull('planCategoryId')?->first();
                $this->redirect(route('subscribe.customizationPlan', [$this->pickedPlan->nameURL]), navigate: false);

            } // end if


        } else {


            $this->pickedPlan = Plan::whereNotNull('planCategoryId')?->first();
            $this->redirect(route('subscribe.customizationPlan', [$this->pickedPlan->nameURL]), navigate: false);


        } // end if


        $this->instance->planId = $this->pickedPlan?->id;






        // ------------------------------------------------
        // ------------------------------------------------





        // 1.3: deliveryDays - defaultValues
        $this->weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];


        // 1.3.2: removeHolidays
        $this->holidays = CityHoliday::where('cityId', 1)
            ->where('isActive', 1)->pluck('weekday')?->toArray() ?? [];

        $this->weekDays = array_diff($this->weekDays, $this->holidays);




        $defaultWeekDays = array_slice($this->weekDays, 0, length: 5);

        foreach ($this->weekDays as $weekDay) {

            // 1.3.3: defaultWeekdays
            if (! session('logged-customer')) {

                $this->instance->deliveryDays[$weekDay] = in_array($weekDay, $defaultWeekDays) ? true : false;


            } else {


                if (! ($this->instance->deliveryDays[$weekDay] ?? null)) {

                    $this->instance->deliveryDays[$weekDay] = false;

                } // end if


            } // end if

        } // end if




        // -----------------------------------------------------------
        // -----------------------------------------------------------





        // 1.3.5: minimumDeliveryDays
        $this->minimumDeliveryDays = CustomerSubscriptionSetting::first()->minimumDeliveryDays;



        // 1.3.6: allergy - exclude
        $this->instance->hasAllergy = 0;
        $this->instance->hasExclude = 0;








        // -------------------------------------------------------
        // -------------------------------------------------------







        // 2: dependencies
        $this->cities = City::all();
        $this->bag = Bag::first();
        $this->countryCodes = CountryCode::all();






        // 2.1: pickedPlanBundle
        $this->planBundles = PlanBundle::whereHas('days')
            ->where('planId', $this->pickedPlan?->id)
            ->where('isForWebsite', true)
            ->whereHas('ranges', function ($query) {
                $query->where('isForWebsite', 1)
                    ->whereHas('range', function ($subQuery) {
                        $subQuery->where('isForWebsite', 1);
                    });
            })->get();


        $this->pickedPlanBundle = $this->planBundles?->first() ?? null;





        // 2.2: optionalBag - defaultBag
        $this->hasOptionalBag = $settings->hasOptionalBag;
        $this->instance->bag = true;
        $this->instance->bagPrice = $this->bag->price ?? 0;




        // 2.3: trigger changePlanBundle
        $this->pickedPlanBundle ? $this->changePlanBundle($this->pickedPlanBundle?->id) : null;
        $this->pickedPlanBundle ? $this->changePlanBundle($this->pickedPlanBundle?->id) : null;





        // 2.4: getStartDate
        $restrictionDays = $settings?->changeCalendarRestriction ?? 0;
        $this->instance->initStartDate ?? $this->instance->initStartDate = date('Y-m-d', strtotime("+{$restrictionDays} days"));



        $this->instance->initStartDate ? $this->instance->startDate = $this->instance->initStartDate : null;







        // 2.5: gender
        if (! session('logged-customer')) {

            $this->instance->gender = 'Male';

        } // end if







        // ---------------------------------------------------------------
        // ---------------------------------------------------------------
        // ---------------------------------------------------------------
        // ---------------------------------------------------------------




        // 2: initials
        $this->subscriptionSettings = CustomerSubscriptionSetting::first();
        $this->instance->promoCodeDiscountPrice = 0;
        $this->instance->referralDiscountPrice = 0;
        $this->instance->tax = $this->subscriptionSettings->TAX;

        // 2.6: phones - payment
        $this->instance->phoneKey = '+971';
        $this->instance->whatsappKey = '+971';

        $this->paymentMethod = CustomerSubscriptionSetting::first()?->paymentMethod ?? null;
        $this->instance->paymentMethodId = $this->paymentMethod->id ?? null;




        // 2.7: planBundleRange
        $this->pickedPlanBundle ? $this->changePlanBundle($this->pickedPlanBundle?->id) : null;



        $this->recalculate();









    } // end function







    // ----------------------------------------------------------------





    public function planDetails($id)
    {

        // 1: getID
        $this->dispatch('planDetails', $id);


    } // end function






    // ----------------------------------------------------------------





    public function changePlan($id)
    {


        // 1: changePlan
        $this->pickedPlan = Plan::find($id);


        $this->redirect(route('subscribe.customizationPlan', [$this->pickedPlan->nameURL]), navigate: false);



    } // end function





    // ----------------------------------------------------------------





    public function changePlanBundle($id)
    {

        // 1: getBundle
        $this->instance->planBundleId = $id;
        $this->pickedPlanBundle = PlanBundle::find($this->instance->planBundleId);







        // 1.2: getRequiredTypes
        foreach ($this->pickedPlanBundle->types->groupBy('typeId') as $commonType => $bundleTypes)
            $this->requiredTypes[$commonType] = $bundleTypes->sum('quantity');





        // 1.3: getKeys
        $this->requiredTypeKeys = array_keys(array_filter($this->requiredTypes));



        // --------------------------------------
        // --------------------------------------






        // 2.1: reset
        $this->instance->planRangeId = null;
        $this->instance->planBundleRangeId = null;
        $this->instance->totalPlanBundleRangePrice = 0;







        // 2.2: getRanges
        $this->planBundleRanges = $this->pickedPlanBundle?->ranges?->where('isForWebsite', true);

        foreach ($this->planBundleRanges ?? [] as $key => $planBundleRange) {


            if ($this->pickedPlanBundle?->name == 'Customized') {

                if ($planBundleRange?->range?->name == 'Customized') {

                    $this->pickedPlanBundleRange = $planBundleRange;
                    break;

                } // end if

            } else {


                if ($planBundleRange?->range?->isForWebsite == true) {

                    $this->pickedPlanBundleRange = $planBundleRange;
                    break;

                } // end if

            } // end if - checkCustomized




        } // end loop








        // 2.3: getBundleTypes
        foreach ($this->pickedPlanBundle->types as $bundleType) {


            $this->instance->planBundleTypes[$bundleType->mealType->id] = $bundleType->quantity;


            // 2.3.5: getDefaultSize / calories
            if ($this->pickedPlanBundle->name == 'Customized') {

                $currentBundleSize = $this->pickedPlanBundle->sizes->where('typeId', $bundleType?->typeId)?->first();


                // :: sizes - calories - prices
                $this->instance->planBundleSizes[$bundleType->mealType->id] = $currentBundleSize?->sizeId;

                $this->instance->planBundleCalories[$bundleType->mealType->id] = ($currentBundleSize?->size?->calories ?? 0) * $this->instance->planBundleTypes[$bundleType->mealType->id];

                $this->instance->planBundlePrices[$bundleType->mealType->id] = ($currentBundleSize?->size?->price ?? 0) * $this->instance->planBundleTypes[$bundleType->mealType->id];


            } // end if


        } // end loop





        // --------------------------------------
        // --------------------------------------





        // 2.3: planBundleDays
        $this->instance->planBundleDays = $this->pickedPlanBundle?->days?->toArray() ?? [];
        $this->planBundleDays = $this->pickedPlanBundle?->days ?? [];



        // 2.3.5: defaultPlanDays
        $this->instance->planDays = $this->planBundleDays?->first()?->days;










        // --------------------------------------
        // --------------------------------------






        // 3: initSelect - datePicker
        $this->dispatch('initSelect');
        $this->dispatch('initDatePicker');




        // 4: setPlanBundleRange
        $this->pickedPlanBundleRange?->id ? $this->changePlanBundleRange($this->pickedPlanBundleRange->id) : null;


    } // end function











    // ----------------------------------------------------------------





    public function changePlanBundleRange($id)
    {



        // 1: getBundleRange
        $this->instance->planBundleRangeId = $id;
        $this->pickedPlanBundleRange = PlanBundleRange::find($id);



        // 1.1: planRange
        $this->instance->planRangeId = $this->pickedPlanBundleRange->planRangeId;







        // 1.2: getPricePerDay - totalRangePrice
        $this->instance->planBundleRangePricePerDay = $this->pickedPlanBundle->rangesByPrice->where('planRangeId', $this->pickedPlanBundleRange->range->id)?->first()?->pricePerDay;


        $this->instance->totalPlanBundleRangePrice = intval($this->instance->planDays ?? 0) * $this->instance->planBundleRangePricePerDay;



        $this->recalculate();



    } // end function






    // --------------------------------------------------------------








    public function changePlanBundleType($quantity, $mealTypeId)
    {


        // 1: modifyBundleTypes
        $this->instance->planBundleTypes[$mealTypeId] = $quantity;



        // 1.2: getDefaultSize / calories
        $typeId = MealType::find($mealTypeId)?->typeId;

        if ($this->pickedPlanBundle->name == 'Customized') {

            $size = Size::find($this->instance->planBundleSizes[$mealTypeId]);

            $this->instance->planBundleCalories[$mealTypeId] = ($size?->calories ?? 0) * $this->instance->planBundleTypes[$mealTypeId];

            $this->instance->planBundlePrices[$mealTypeId] = ($size?->price ?? 0) * $this->instance->planBundleTypes[$mealTypeId];


            $this->recalculate();

        } // end if


    } // end if







    // --------------------------------------------------------------








    public function changePlanBundleSize($mealTypeId)
    {


        // 1: getDefaultSize / calories
        $typeId = MealType::find($mealTypeId)?->typeId;

        if ($this->pickedPlanBundle->name == 'Customized') {

            $size = Size::find($this->instance->planBundleSizes[$mealTypeId]);

            $this->instance->planBundleCalories[$mealTypeId] = ($size?->calories ?? 0) * $this->instance->planBundleTypes[$mealTypeId];

            $this->instance->planBundlePrices[$mealTypeId] = ($size?->price ?? 0) * $this->instance->planBundleTypes[$mealTypeId];


            $this->recalculate();


        } // end if


    } // end if








    // --------------------------------------------------------------






    public function changePlanDays()
    {

        $this->recalculate();

    } // end if





    // --------------------------------------------------------------






    public function changeBag()
    {

        $this->recalculate();


    } // end if













    // ----------------------------------------------------------------





    public function calculateDeliveryPrice(): void
    {



        // 1: get instance
        $city = City::find($this->instance->cityId);



        // 1.2: getDeliveryCharge
        if ($city)
            $this->instance->deliveryPrice = $city?->deliveryCharge * intval($this->instance->planDays);



        // 1.3: recalculate
        $this->recalculate();

    } // end function









    // ----------------------------------------------------------------







    public function checkPromo($toRecalculate = true)
    {




        // 1: getPromo
        $planPromos = PromoCodePlan::where('planId', $this->pickedPlan->id)->get()?->pluck('promoCodeId')->toArray() ?? [];


        $promo = PromoCode::where('isActive', true)
            ->whereIn('id', $planPromos)
            ->where('code', $this->instance?->promoCode)
            ->whereColumn('currentUsage', '<', 'limit')->first();





        // 1.2: getDiscount
        if ($promo) {


            if ($promo->percentage) {

                $this->instance->promoCodeDiscountPrice = $this->instance->planPrice * ($promo->percentage / 100);

            } else {

                $this->instance->promoCodeDiscountPrice = $promo->cashAmount;

            } // end if


        } else {


            $this->instance->promoCodeDiscountPrice = 0;

        } // end if








        // 1.3: recalculate
        if ($toRecalculate) {

            $this->recalculate();

        } // end if





    } // end function







    // ----------------------------------------------------------------





    public function checkWallet()
    {

        $this->recalculate();

    } // end function










    // -------------------------------------------------------------




    public function reRender()
    {

        $this->render();

    } // end function








    // -------------------------------------------------------------







    public function recalculate()
    {



        // 1: recalculatePrice
        $this->instance->totalPlanBundleRangePrice = intval($this->instance->planDays ?? 0) * $this->instance->planBundleRangePricePerDay;





        // 1.2: discountPrice
        $bundleDiscount = PlanBundleDay::where('planBundleId', $this->instance->planBundleId)
            ->where('days', $this->instance?->planDays ?? 0)?->first()?->discount ?? 0;

        $bundleAdjustmentDiscount = PlanBundleDay::where('planBundleId', $this->instance->planBundleId)
            ->where('days', $this->instance?->planDays ?? 0)?->first()?->adjustor ?? 0;



        $this->instance->planBundleRangeDiscountPrice = $this->instance->totalPlanBundleRangePrice * ($bundleDiscount / 100);
        $this->instance->planBundleRangeAdjustmentPrice = $this->instance->totalPlanBundleRangePrice * ($bundleAdjustmentDiscount / 100);




        // 1.3: planPrice - totalPrice
        $this->instance->planPrice = $this->instance->totalPlanBundleRangePrice - ($this->instance->planBundleRangeDiscountPrice + $this->instance->planBundleRangeAdjustmentPrice);







        // ---------------------------------------------------------------
        // ---------------------------------------------------------------



        // 2: extra: customized
        if ($this->pickedPlanBundle->name == "Customized") {

            // 2.1: totalPlanBundlePrice - planPrice
            $this->instance->totalPlanBundleRangePrice = array_sum($this->instance->planBundlePrices);
            $this->instance->planPrice = array_sum($this->instance->planBundlePrices);


        } // end if








        // ----------------------------------------------------------------
        // ----------------------------------------------------------------
        // ----------------------------------------------------------------
        // ----------------------------------------------------------------



        // :: PART 2



        // 1 getPlanPrice
        $this->instance->planPrice = $this->instance->totalPlanBundleRangePrice - ($this->instance->planBundleRangeDiscountPrice + $this->instance->planBundleRangeAdjustmentPrice);




        // 1.2: checkPromo
        $this->checkPromo(false);
        $this->instance->planPrice -= $this->instance->referralDiscountPrice;
        $this->instance->planPrice -= $this->instance->promoCodeDiscountPrice;




        // 1.3: getTotal - getTax (checkBag)
        if ($this->instance->bag) {

            $this->instance->totalPrice = $this->instance->planPrice + $this->instance->bagPrice;

            $this->instance->totalCheckoutPrice = $this->instance->planPrice + $this->instance->bagPrice + ($this->instance->deliveryPrice ?? 0);


        } else {

            $this->instance->totalPrice = $this->instance->planPrice;

            $this->instance->totalCheckoutPrice = $this->instance->planPrice + ($this->instance->deliveryPrice ?? 0);

        } // end if - bagPrice




        // 1.4: + Tax
        $this->instance->taxPrice = round($this->instance->totalCheckoutPrice * ($this->instance->tax / 100));
        $this->instance->totalCheckoutPrice += $this->instance->taxPrice;




        // 1.5: wallet
        if ($this->instance->useWallet && $this->customerWallet) {


            if ($this->customerWallet?->balance >= $this->instance->totalCheckoutPrice) {

                $this->instance->walletDiscountPrice = $this->instance->totalCheckoutPrice;
                $this->instance->totalCheckoutPrice = 0;

            } else {

                $this->instance->walletDiscountPrice = doubleval($this->customerWallet->balance);
                $this->instance->totalCheckoutPrice -= doubleval($this->customerWallet->balance);

            } // end if



        } else {


            $this->instance->walletDiscountPrice = 0;

        } // end if




    } // end function









    // --------------------------------------------------------------






    public function continue()
    {






        // 1: validate requiredTypes with bundleTypes
        $allTypesCount = 0;
        $types = Type::all();

        foreach ($types ?? [] as $type) {


            // 1.2: exists
            if (! empty($this->requiredTypes[$type->id])) {




                // 1.3: getTypeCount
                $typeCount = 0;

                foreach ($type->mealTypes as $mealType) {

                    $typeCount += $this->instance->planBundleTypes[$mealType->id];
                    $allTypesCount += $this->instance->planBundleTypes[$mealType->id];

                } // end loop





                // ------------------------------------------
                // ------------------------------------------
                // ------------------------------------------






                // 1.4: compareRequiredTypes
                if ($typeCount != $this->requiredTypes[$type->id]) {

                    // $this->makeAlert('info', "Please select the correct number of {$type->name} to continue");

                    // return false;

                } // end if


            } // end if

        } // end loop





        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------




        // 1.4: compareRequiredTypes
        if ($this->pickedPlanBundle->name == 'Customized' && $allTypesCount <= 0) {

            // $this->makeAlert('info', "Please select the enough number of meals to continue");

            return false;

        } // end if





        // ----------------------------------------





        // 1.2: validateExcludes / allergies
        if (count($this->instance->excludeLists ?? []) > 5 || count($this->instance->allergyLists ?? []) > 5) {

            // $this->makeAlert('info', "Maximum of five exclusions or allergy groups allowed.");

            // return false;

        } // end if








        // ----------------------------------------
        // ----------------------------------------






        // :: checkEmail
        $fullEmail = explode('@', $this->instance->fullEmail);

        $this->instance->email = $fullEmail[0];
        $this->instance->emailProvider = "@{$fullEmail[1]}";


        $emailExists = Customer::where('email', $this->instance->email)->where('emailProvider', $this->instance->emailProvider)->count();



        if ($this->instance->isExistingCustomer == false) {

            if ($emailExists > 0) {

                $this->makeAlert('info', 'This email is already in use');

                return false;

            } // end if





            // :: checkPhone
            $phoneExists = Customer::where('phone', $this->instance->phone)->count();

            if ($phoneExists > 0) {

                $this->makeAlert('info', 'This phone is already in use');

                return false;

            } // end if




        } // end if - isNotExisting






        // ----------------------------------------
        // ----------------------------------------





        // :: checkUpcoming
        $currentCustomer = Customer::where('email', $this->instance->email)->where('emailProvider', $this->instance->emailProvider)?->first();



        if ($currentCustomer?->hasUpcomingSubscription() ?? null) {

            $this->makeAlert('info', 'You already have an upcoming subscription, please try again after it starts');

            return false;

        } // end if





        // ----------------------------------------
        // ----------------------------------------




        // 1.3: validateDeliveryDays
        $deliveryDays = array_filter((array) $this->instance->deliveryDays ?? [], function ($value, $key) {

            return $value == true;

        }, ARRAY_FILTER_USE_BOTH);



        if (count($deliveryDays) < $this->minimumDeliveryDays) {


            $this->makeAlert('info', 'Please select your delivery days');

            return false;


        } // end if



        // 1.3.5: confirm
        $this->instance->deliveryDays = array_keys($deliveryDays ?? []);








        // ----------------------------------------
        // ----------------------------------------
        // ----------------------------------------
        // ----------------------------------------
        // ----------------------------------------






        if ($this->isProcessing == false) {



            // 1: changeProcessing - determineCustomer
            $this->isProcessing = true;
            ($this->instance->isExistingCustomer || $this->instance->isManualExistingCustomer) ? $type = 'customer' : $type = 'lead';







            // 1.2: store
            $this->storeCustomer($type);


            // 1.3: Paymennt / Stripe
            if ($this->paymentMethod->name == 'Paymennt') {


                if (env('APP_PAYMENT') && env('APP_PAYMENT') == 'local') {

                    $this->makeLocalCheckoutPaymennt($this->instance, $this->payment, $this->paymentMethod);

                } else {

                    $this->makeCheckoutPaymennt($this->instance, $this->payment, $this->paymentMethod);

                } // end if



            } elseif ($this->paymentMethod->name == 'Stripe') {


                if (env('APP_PAYMENT') && env('APP_PAYMENT') == 'local') {

                    $this->makeLocalCheckoutPaymennt($this->instance, $this->payment, $this->paymentMethod);

                } else {

                    // :: stripe

                } // end if


            } // end if


        } // end if





    } // end function










    // ----------------------------------------------------------------





    public function storeCustomer($type = 'customer')
    {



        // 1: restructure



        // 1.2: deliveryDays
        $restructure = [];
        $OGDeliveryDays = $this->instance->deliveryDays;


        foreach ($this->instance?->deliveryDays ?? [] as $deliveryDay) {

            $restructure[$deliveryDay] = true;

        } // end loop


        $this->instance->deliveryDays = $restructure ?? [];






        // 1.3: date
        $this->instance->startDate = date('Y-m-d', strtotime(str_replace('/', '-', $this->instance->startDate)));









        // ----------------------------------------
        // ----------------------------------------







        // 2: storeCustomer
        Session::put('customer', $this->instance);





        // 2.1: determine
        if ($type == 'customer') {

            $response = $this->makeRequest('subscription/lead/store', $this->instance);

        } elseif ($type == 'lead') {

            $response = $this->makeRequest('subscription/lead/store', $this->instance);

        } // end if





        // 2.2: returnOGDeliveryDays
        $this->instance->deliveryDays = $OGDeliveryDays;




    } // end function







    // ----------------------------------------------------------------






    #[On('syncExcludes')]
    public function syncExcludes()
    {


        // 1: syncValues
        $this->instance->excludeLists = session('excludeLists');
        $this->instance->allergyLists = session('allergyLists');


    } // end function









    // ----------------------------------------------------------------









    public function tokenCustomer($customer)
    {



        // 1: flag - getBasicInformation
        $this->instance->isExistingCustomer = true;

        $this->instance->firstName = $customer->firstName;
        $this->instance->lastName = $customer->lastName;
        $this->instance->gender = $customer->gender;

        $this->instance->email = $customer->email;
        $this->instance->emailProvider = $customer->emailProvider;
        $this->instance->fullEmail = $customer->fullEmail();


        $this->instance->phone = $customer->phone;
        $this->instance->phoneKey = $customer->phoneKey;

        $this->instance->whatsapp = $customer->whatsapp;
        $this->instance->whatsappKey = $customer->whatsappKey;




        // 1.2: location
        $latestAddress = $customer?->latestAddress();
        $this->instance->cityId = $latestAddress->cityId;
        $this->instance->cityDistrictId = $latestAddress->cityDistrictId;
        $this->instance->cityDeliveryTimeId = $latestAddress->deliveryTimeId;

        $this->instance->locationAddress = $latestAddress->locationAddress;
        $this->instance->apartment = $latestAddress->apartment;
        $this->instance->floor = $latestAddress->floor;






        // 1.3: get initStartDate
        $restrictionDays = CustomerSubscriptionSetting::first()?->changeCalendarRestriction ?? 0;


        if ($customer?->latestSubscription()?->untilDate && $customer?->latestSubscription()?->untilDate > $this->getCurrentDate()) {

            $this->instance->initStartDate = date('Y-m-d', strtotime($customer?->latestSubscription()?->untilDate."+1 days"));

        } else {

            $this->instance->initStartDate = date('Y-m-d', strtotime("+{$restrictionDays} days"));

        } // end if







        // 1.4: resetVars
        $deliveryDays = $latestAddress->deliveryDaysInArray();

        foreach ($deliveryDays ?? [] as $key => $weekDay)
            $this->instance->deliveryDays[$weekDay] = true;


    } // end function








    // ---------------------------------------------------------------





    public function render()
    {


        return view('livewire.subscribe.customization');

    } // end function


} // end class
