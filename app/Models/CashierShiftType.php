<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierShiftType extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->hasMany(User::class, 'cashierShiftTypeId');

    } // end function





    public function menuShifts()
    {
        return $this->hasMany(MenuShift::class, 'cashierShiftTypeId');

    } // end function






    public function currentMenuShift($userId = null)
    {


        // 1: menuShifts
        if ($userId) {

            $menuShift = $this->menuShifts()?->where('userId', $userId)
                    ?->where('startDate', date('Y-m-d'))?->first();

        } else {

            $menuShift = $this->menuShifts()?->where('startDate', date('Y-m-d'))?->first();

        } // end if





        return $menuShift;


    } // end function




} // end class
