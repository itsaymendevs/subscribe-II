<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityHoliday extends Model
{
    use HasFactory;


    public function city()
    {

        return $this->belongsTo(City::class, 'cityId');

    } // end function


} // end model
