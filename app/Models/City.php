<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;


    public function holidays()
    {

        return $this->hasMany(CityHoliday::class, 'cityId');

    } // end function




    public function districts()
    {

        return $this->hasMany(CityDistrict::class, 'cityId');

    } // end function





} // end model
