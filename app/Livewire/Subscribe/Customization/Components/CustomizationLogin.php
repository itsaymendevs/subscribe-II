<?php

namespace App\Livewire\Subscribe\Customization\Components;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\Customer;
use App\Models\CustomerSubscriptionSetting;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CustomizationLogin extends Component
{


    use HelperTrait;

    // :: variables
    public SubscriptionForm $instance;
    public $customerEmail, $customerPassword, $customerMessage;







    public function checkCustomer()
    {



        // 1: checkCustomer
        $email = explode('@', $this->customerEmail)[0] ?? null;
        $emailProvider = explode('@', $this->customerEmail)[1] ?? null;

        $customer = Customer::where('email', $email)
            ->where('emailProvider', "@{$emailProvider}")->first() ?? null;







        // 1.2: continue
        if ($customer && Hash::check($this->customerPassword, $customer?->password)) {




            // 1.3: flag - getBasicInformation
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




            // 1.3.2: location
            $latestAddress = $customer?->latestAddress();
            $this->instance->cityId = $latestAddress->cityId;
            $this->instance->cityDistrictId = $latestAddress->cityDistrictId;
            $this->instance->cityDeliveryTimeId = $latestAddress->deliveryTimeId;

            $this->instance->locationAddress = $latestAddress->locationAddress;
            $this->instance->apartment = $latestAddress->apartment;
            $this->instance->floor = $latestAddress->floor;






            // 1.4: get initStartDate
            $restrictionDays = CustomerSubscriptionSetting::first()?->changeCalendarRestriction ?? 0;


            if ($customer?->latestSubscription()?->untilDate && $customer?->latestSubscription()?->untilDate > $this->getCurrentDate()) {


                $this->instance->initStartDate = date('Y-m-d', strtotime($customer?->latestSubscription()?->untilDate."+1 days"));


            } else {


                $this->instance->initStartDate = date('Y-m-d', strtotime("+{$restrictionDays} days"));


            } // end if








            // 1.5: resetVars
            $deliveryDays = $latestAddress->deliveryDaysInArray();

            foreach ($deliveryDays ?? [] as $key => $weekDay)
                $this->instance->deliveryDays[$weekDay] = true;






            // 1.6: makeSession - refresh
            $this->customerMessage = '';
            Session::put('logged-customer', $this->instance);

            return $this->redirect(route('subscribe.customization'), navigate: false);






            // 2: incorrect
        } else {


            $this->customerMessage = 'Invalid Email or Password';

        } // end if




    } // end function







    // ----------------------------------------------------------------





    public function render()
    {
        return view('livewire.subscribe.customization.components.customization-login');

    } // end function


} // end class
