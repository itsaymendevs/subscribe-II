<?php

namespace App\Providers;

use App\Models\OrderSetting;
use App\Models\SubscribeCustomization;
use Illuminate\Support\ServiceProvider;
use App\Models\CustomerSubscriptionSetting;
use App\Models\GeneralSetting;
use App\Models\Profile;
use App\Models\User;
use App\Models\VersionPermission;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{




    use HelperTrait;



    public function register(): void
    {



    } // end function





    // -------------------------------------------------------------------





    public function boot(): void
    {




        // 1: globalProfile
        $profile = Profile::first();
        $storagePath = env('APP_STORAGE')."/".$profile->nameURL."/";

        View::share('globalProfile', $profile);
        View::share('storagePath', $storagePath);



        // 1.2: currentDate - nextDate
        View::share('globalCurrentDate', $this->getCurrentDate());
        View::share('globalNextDate', $this->getNextDate());








        // ------------------------------------------------
        // ------------------------------------------------







        // 3: subscriptionSettings
        $subscriptionSettings = CustomerSubscriptionSetting::first();

        View::share('subscriptionSettings', $subscriptionSettings);




        // :: defaultPreview
        View::share('defaultPreview', url('assets/img/placeholder.png'));
        View::share('defaultSecondPreview', url('assets/plugins/customer-portal/img/helpers/upload.png'));



        // 4: generalSettings
        $generalSettings = GeneralSetting::first();

        View::share('generalSettings', $generalSettings);






        // 5: versionPermission
        $versionPermission = VersionPermission::first();

        View::share('versionPermission', $versionPermission);





        // 6: subscribeCustomization
        $customization = SubscribeCustomization::first();

        View::share('customization', value: $customization);




    } // end function



} // end provider


