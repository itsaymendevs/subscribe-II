<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCalendarPlan extends Model
{
    use HasFactory;


    public function calendar()
    {

        return $this->belongsTo(MenuCalendar::class, 'menuCalendarId');

    } // end function



    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function




} // end model
