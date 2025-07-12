<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverZone extends Model
{
    use HasFactory;



    public function driver()
    {

        return $this->belongsTo(Driver::class, 'driverId');

    } // end function



    public function zone()
    {

        return $this->belongsTo(Zone::class, 'zoneId');

    } // end function


} // end model
