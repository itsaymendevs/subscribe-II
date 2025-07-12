<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneDistrict extends Model
{
    use HasFactory;




    public function zone()
    {

        return $this->belongsTo(Zone::class, 'zoneId');

    } // end function



    public function district()
    {

        return $this->belongsTo(CityDistrict::class, 'cityDistrictId');

    } // end function




} // end model
