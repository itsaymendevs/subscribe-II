<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomMealPartRemovablePart extends Model
{
    use HasFactory;

    public function part()
    {

        return $this->belongsTo(related: Meal::class, foreignKey: 'partId');

    } // end function




    public function mealPart()
    {

        return $this->belongsTo(related: OrderCustomMealPart::class, foreignKey: 'orderCustomMealPartId');

    } // end function






} // end model

