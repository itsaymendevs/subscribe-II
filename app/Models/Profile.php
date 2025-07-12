<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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






} // end class
