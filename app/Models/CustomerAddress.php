<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;




    public function deliveryDays()
    {

        return $this->hasMany(CustomerDeliveryDay::class, 'customerAddressId');

    } // end function







    public function city()
    {

        return $this->belongsTo(City::class, 'cityId');

    } // end function







    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function











    public function district()
    {

        return $this->belongsTo(CityDistrict::class, 'cityDistrictId');

    } // end function







    public function deliveryTime()
    {

        return $this->belongsTo(CityDeliveryTime::class, 'deliveryTimeId');

    } // end function











    // ----------------------------------------------------
    // ----------------------------------------------------
    // ----------------------------------------------------
    // ----------------------------------------------------









    public function halfAddress()
    {


        // 1: format (City - District \n locationAddress)
        $halfAddress = "{$this?->city?->name}<br />{$this?->district?->name}<br />{$this?->locationAddress}";




        // :: return
        return $halfAddress;


    } // end function











    // ----------------------------------------------------








    public function apartmentAndFloor()
    {


        // 1: format (Apartment - Floor)
        $apartmentAndFloor = $this?->apartment ? 'Apartment '.$this->apartment : '';
        $apartmentAndFloor .= $this?->floor ? ' — Floor '.$this->floor : '';




        // :: return
        return $apartmentAndFloor;


    } // end function









    // ----------------------------------------------------






    public function apartmentAndFloorAlt()
    {


        // 1: format (Apartment - Floor)
        $apartmentAndFloor = $this?->apartment ? 'Apartment '.$this->apartment : '';
        $apartmentAndFloor .= $this?->floor ? '<br>Floor '.$this->floor : '';




        // :: return
        return $apartmentAndFloor;


    } // end function








    // ----------------------------------------------------








    public function deliveryDaysInArray()
    {


        // 1: getDeliveryDays
        $deliveryDaysInArray = $this->deliveryDays()->get()?->pluck('weekDay')->toArray() ?? [];



        // :: return
        return $deliveryDaysInArray;


    } // end function







} // end model
