<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtraPart extends Model
{
    use HasFactory;


    public function part()
    {

        return $this->belongsTo(Meal::class, 'partId');

    } // end function






    public function order()
    {

        return $this->belongsTo(Order::class, 'orderId');

    } // end function






} // end model
