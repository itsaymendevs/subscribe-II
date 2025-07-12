<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class Driver extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    use HelperTrait;




    public function shift()
    {

        return $this->belongsTo(ShiftType::class, 'shiftTypeId');

    } // end function







    public function zones()
    {

        return $this->hasMany(DriverZone::class, 'driverId');

    } // end function









    public function deliveries()
    {

        return $this->hasMany(CustomerSubscriptionDelivery::class, 'driverId');

    } // end function






    public function vehicle()
    {

        return $this->belongsTo(Vehicle::class, 'vehicleId');

    } // end function










    public function todayDeliveries()
    {

        return $this->deliveries()?->where('deliveryDate', $this->getCurrentDate())?->get();


    } // end function







    public function todayPendingDeliveries()
    {

        return $this->deliveries()?->where('deliveryDate', $this->getCurrentDate())
                ?->whereIn('status', ['Pending', 'Picked'])
                ?->get();


    } // end function








    public function todayCompletedDeliveries()
    {

        return $this->deliveries()?->where('deliveryDate', $this->getCurrentDate())
                ?->where('status', 'Completed')
                ?->get();


    } // end function










    // -----------------------------------------------------
    // -----------------------------------------------------








    public function zonesInArray()
    {


        // 1: getZones - loop
        $zonesInArray = [];

        $driverZones = $this->zones()?->get();

        foreach ($driverZones ?? [] as $driverZone) {
            array_push($zonesInArray, $driverZone->zone->name);
        }


        return $zonesInArray ? $zonesInArray : ['Not Assigned'];


    } // end function








    public function zonesForTooltips()
    {


        // 1: getZones - convertToString
        $driverZones = $this->zonesInArray();
        $driverZones = implode('<br />', $driverZones);

        return $driverZones;


    } // end function










    // -----------------------------------------------------
    // -----------------------------------------------------






    public function districts()
    {


        // 1: getZones
        $driverZones = $this->zones()?->get()?->pluck('zoneId')?->toArray() ?? [];
        $zoneDistricts = ZoneDistrict::whereIn('zoneId', $driverZones)?->pluck('cityDistrictId')?->toArray() ?? [];




        // 1.2: getDistricts
        $districts = CityDistrict::whereIn('id', $zoneDistricts)?->get();




        return $districts;


    } // end function






} // end model
