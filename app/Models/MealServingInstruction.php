<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealServingInstruction extends Model
{
    use HasFactory;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function






    public function instruction()
    {

        return $this->belongsTo(ServingInstruction::class, 'servingInstructionId');

    } // end function






} // end model
