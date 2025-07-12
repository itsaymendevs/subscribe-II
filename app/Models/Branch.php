<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
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










    // ----------------------------------------------------
    // ----------------------------------------------------
    // ----------------------------------------------------
    // ----------------------------------------------------









    public function fullAddress()
    {


        // 1: format (City - District \n locationAddress)
        $fullAddress = "{$this?->city?->name}<br />{$this?->district?->name}<br />{$this?->address}";



        return $fullAddress;


    } // end function




} // end class
