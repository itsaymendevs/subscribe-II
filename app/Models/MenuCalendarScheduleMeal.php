<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCalendarScheduleMeal extends Model
{
    use HasFactory;







    public function mealType()
    {

        return $this->belongsTo(MealType::class, 'mealTypeId');

    } // end function







    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');


    } // end function












} // end model




