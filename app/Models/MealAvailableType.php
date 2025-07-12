<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealAvailableType extends Model
{
    use HasFactory;



    public function meal()
    {

        return $this->hasMany(Meal::class, 'mealId');

    } // end function



    public function mealType()
    {

        return $this->belongsTo(MealType::class, 'mealTypeId');

    } // end function





} // end model
