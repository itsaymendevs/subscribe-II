<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;



    public function promotion()
    {

        return $this->hasOne(VehiclePromotion::class, 'vehicleId');

    } // end function






} // end model
