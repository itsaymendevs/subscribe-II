<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuShift extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'userId');

    } // end function




    public function cashierShiftType()
    {
        return $this->belongsTo(CashierShiftType::class, 'cashierShiftTypeId');

    } // end function




} // end class
