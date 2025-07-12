<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomMeal extends Model
{
    use HasFactory;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function






    public function order()
    {

        return $this->belongsTo(Order::class, 'orderId');

    } // end function






    public function container()
    {

        return $this->belongsTo(Container::class, 'containerId');

    } // end function





    public function parts()
    {

        return $this->hasMany(OrderCustomMealPart::class, 'orderCustomMealId');

    } // end function





} // end model
