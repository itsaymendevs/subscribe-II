<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCalendarSchedule extends Model
{
    use HasFactory;



    public function calendar()
    {

        return $this->belongsTo(MenuCalendar::class, 'menuCalendarId');

    } // end function






    public function meals()
    {

        return $this->hasMany(MenuCalendarScheduleMeal::class, 'menuCalendarScheduleId');

    } // end function













} // end model
