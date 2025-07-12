<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;



    public function mealTypes()
    {

        return $this->hasMany(MealType::class, 'typeId');

    } // end function






    public function meals()
    {

        return $this->hasMany(Meal::class, 'typeId');

    } // end function







} // end model
