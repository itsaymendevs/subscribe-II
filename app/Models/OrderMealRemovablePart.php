<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMealRemovablePart extends Model
{
    use HasFactory;

    public function part()
    {

        return $this->belongsTo(related: Meal::class, foreignKey: 'partId');

    } // end function




} // end model
