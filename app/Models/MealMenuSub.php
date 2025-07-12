<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealMenuSub extends Model
{
    use HasFactory;

    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function



    public function subMenu()
    {

        return $this->belongsTo(MenuSub::class, 'menuSubId');

    } // end function




} // end model
