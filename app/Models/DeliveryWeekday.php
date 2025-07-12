<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryWeekday extends Model
{
    use HasFactory;


    public function coverageWeekdays()
    {


        return $this->hasMany(DeliveryWeekdayCoverage::class, 'deliveryWeekdayId');


    } // end function





    public function coverageWeekdaysInArray()
    {


        // 1: getCoverages
        $coverageWeekdays = $this->coverageWeekdays()?->get()?->pluck('weekday')?->toArray() ?? [];

        return $coverageWeekdays;


    } // end function




} // end model
