<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSub extends Model
{
    use HasFactory;


    public function meals()
    {

        return $this->hasMany(MealMenuSub::class, 'menuSubId');

    } // end function





} // end model
