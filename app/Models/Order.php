<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;






    public function city()
    {

        return $this->belongsTo(City::class, 'cityId');

    } // end function







    public function district()
    {

        return $this->belongsTo(CityDistrict::class, 'cityDistrictId');

    } // end function









    public function branch()
    {

        return $this->belongsTo(Branch::class, 'branchId');

    } // end function





    public function branchTable()
    {

        return $this->belongsTo(BranchTable::class, 'branchTableId');

    } // end function




    public function driver()
    {

        return $this->belongsTo(Driver::class, 'driverId');

    } // end function





    public function paymentMethod()
    {

        return $this->belongsTo(PaymentMethod::class, 'paymentMethodId');

    } // end function







    public function meals()
    {

        return $this->hasMany(OrderMeal::class, 'orderId', 'id');

    } // end function








    public function customMeals()
    {

        return $this->hasMany(OrderCustomMeal::class, 'orderId', 'id');

    } // end function






    // --------------------------------------------------------
    // --------------------------------------------------------
    // --------------------------------------------------------
    // --------------------------------------------------------





    public function fullName()
    {


        if ($this->firstName && $this->lastName) {

            return $this->firstName.' '.$this->lastName;

        } else {

            return "";

        } // end if

    } // end function









    // ----------------------------------------------------
    // ----------------------------------------------------






    public function deliveryTime()
    {


        // 1: getOrderTime
        $orderTime = date('h:i', strtotime($this->created_at));
        $currentOrderTime = date('h:i', strtotime($this->deliveryTime));

        if ($orderTime >= $currentOrderTime) {

            return "Immediately";

        } else {

            return $this->deliveryTime;

        } // end if



    } // end function















    // ----------------------------------------------------
    // ----------------------------------------------------






    public function timelapse()
    {


        // 1: getOrderTime
        $orderTime = date('H:i', strtotime($this->deliveryTime ?? $this->created_at));


        // 1.2: getTimeNow
        $timeNow = date('H:i');




        // -----------------------------------------------------
        // -----------------------------------------------------




        // 2: getMinutes
        $minutes = (strtotime($timeNow) - strtotime($orderTime)) / 60;



        if ($minutes <= 0) {

            return "";

        } elseif ($minutes == 0) {

            return "Just Now";

        } elseif ($minutes <= 60) {

            return abs($minutes).' mins. ago';

        } else {

            return '60+ mins. ago';

        }


    } // end function









    // ----------------------------------------------------
    // ----------------------------------------------------






    public function timelapseInFormat()
    {


        // 1: getOrderTime
        $orderTime = date('H:i', strtotime($this->deliveryTime ?? $this->created_at));


        // 1.2: getTimeNow
        $timeNow = date('H:i');




        // -----------------------------------------------------
        // -----------------------------------------------------




        // 2: getMinutes
        $minutes = (strtotime($timeNow) - strtotime($orderTime)) / 60;



        return abs($minutes);


    } // end function






    // ----------------------------------------------------
    // ----------------------------------------------------
    // ----------------------------------------------------
    // ----------------------------------------------------









    public function halfAddress()
    {


        // 1: format (City \n District)
        $halfAddress = "{$this?->city?->name}<br />{$this?->district?->name}";


        return $halfAddress;


    } // end function








    // ----------------------------------------------------
    // ----------------------------------------------------






    public function apartmentAndFloor()
    {


        // 1: format (Apartment - Floor)
        $apartmentAndFloor = $this?->apartment ? 'Apartment '.$this->apartment : '';
        $apartmentAndFloor .= $this?->floor ? '<br/>Floor '.$this->floor : '';

        return $apartmentAndFloor;


    } // end function






} // end class
