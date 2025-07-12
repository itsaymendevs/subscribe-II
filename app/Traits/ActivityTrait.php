<?php

namespace App\Traits;

use App\Models\ActivityLog;
use App\Models\CustomerActivityLog;
use stdClass;


trait ActivityTrait
{




    protected function storeActivity($module, $description)
    {




        // :: checkSession
        if (empty(session('userId'))) {

            return $this->redirect(route('dashboard.login'));

        } // end if






        // -----------------------------------
        // -----------------------------------







        // 1: create
        $activity = new ActivityLog();



        // 1.2: general
        $activity->userId = session('userId') ?? null;
        $activity->name = session('userName') ?? null;
        $activity->dateTime = date('Y-m-d h:i:s');



        // 1.2 module - description
        $activity->module = $module;
        $activity->description = $description;


        $activity->save();



        // :: return
        return true;



    } // end function










    // -----------------------------------------------------------------
    // -----------------------------------------------------------------







    protected function storeCustomerActivity($module, $description)
    {




        // :: checkSession
        if (empty(session('customerId'))) {

            return $this->redirect(route('portals.customer.login'));

        } // end if






        // -----------------------------------
        // -----------------------------------







        // 1: create
        $activity = new CustomerActivityLog();



        // 1.2: general
        $activity->customerId = session('customerId') ?? null;
        $activity->name = session('customerName') ?? null;
        $activity->dateTime = date('Y-m-d h:i:s');



        // 1.2 module - description
        $activity->module = $module;
        $activity->description = $description;


        $activity->save();



        // :: return
        return true;



    } // end function








} // end trait

