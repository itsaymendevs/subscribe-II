<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCalendarDiet extends Model
{
    use HasFactory;



    public function calendar()
    {

        return $this->belongsTo(MenuCalendar::class, 'menuCalendarId');

    } // end function



    public function diet()
    {

        return $this->belongsTo(Diet::class, 'dietId');

    } // end function





} // end model
