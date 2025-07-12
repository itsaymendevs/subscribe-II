<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomMealPart extends Model
{
    use HasFactory;



    public function part()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function





} // end class


