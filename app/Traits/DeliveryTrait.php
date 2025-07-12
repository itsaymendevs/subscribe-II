<?php

namespace App\Traits;

use App\Models\CustomerSubscriptionDelivery;
use App\Models\Driver;
use App\Models\DriverZone;
use App\Models\ShiftType;
use App\Models\ZoneDistrict;
use stdClass;


trait DeliveryTrait
{


    use HelperTrait;


    protected function checkDeliveryDaysConflict($deliveryDays, $upcomingDeliveries, $startDate, $upcomingStartDate)
    {




        // :: root
        $untilDate = null;
        $dateCounter = 0;
        $deliveryCounter = 0;
        $deliveryTotalCounter = intval($upcomingDeliveries);
        $deliveryWeekDays = $deliveryDays;









        // :: loop
        while (true) {




            // 1: getDeliveryDate - deliveryAsWeekDay
            $deliveryDate = date('Y-m-d', strtotime($startDate . "+{$dateCounter} days"));

            $deliveryAsWeekDay = date('l', strtotime($deliveryDate));





            // :: ifExists
            if (in_array($deliveryAsWeekDay, $deliveryWeekDays)) {



                // 1.2.1: increaseCounter
                $deliveryCounter++;






                // 1.2.2: checkIfDone - save untilDate
                if ($deliveryCounter == $deliveryTotalCounter) {


                    $untilDate = $deliveryDate;
                    break;

                } // end if


            } // end if









            // :: increaseCounter
            $dateCounter++;




        } // end loop











        // ------------------------------------------
        // ------------------------------------------





        // 2: conflict - or notConflict
        if ($upcomingStartDate <= $untilDate)
            return true;
        else
            return false;






    } // end function








    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------













    protected function reAssignDrivers()
    {



        // :: root
        $deliveries = CustomerSubscriptionDelivery::whereNull('driverId')
            ->where('deliveryDate', '>=', $this->getCurrentDate())->get();









        // :: loop - deliveriesByCustomer
        foreach ($deliveries ?? [] as $delivery) {




            // 1: getAddress
            $customerAddress = $delivery?->customer?->addressByDay($delivery->deliveryDate);









            // :: exists
            if ($customerAddress && $customerAddress?->deliveryTime) {



                // 1.2: getShift
                $shiftType = ShiftType::where('shiftFrom', '<=', $customerAddress?->deliveryTime?->deliveryFrom)->where('shiftUntil', '>=', $customerAddress?->deliveryTime?->deliveryUntil)?->first();







                // -------------------------------
                // -------------------------------






                // 1.3: getZones - potentialDrivers
                $zones = ZoneDistrict::where('cityDistrictId', $customerAddress?->cityDistrictId)
                        ?->get()?->pluck('zoneId')?->toArray() ?? [];


                $potentialDrivers = DriverZone::whereIn('zoneId', $zones)
                        ?->get()->pluck('driverId')?->toArray() ?? [];








                // -------------------------------
                // -------------------------------






                // :: exists
                if ($shiftType) {





                    // 1.3: getDriver
                    $driver = Driver::whereIn('id', $potentialDrivers)
                        ->where('shiftTypeId', $shiftType?->id)?->first();





                    // :: updateDelivery
                    $delivery->driverId = $driver?->id ?? null;
                    $delivery->save();




                } // end if - shiftExists






            } // end if - addressExists









        } // end loop - deliveries












    } // end function








} // end trait

