<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryWeekdayCoverage extends Model
{
    use HasFactory;


    public function weekday()
    {


        return $this->belongsTo(DeliveryWeekday::class, 'deliveryWeekdayId');


    } // end function




} // end model



