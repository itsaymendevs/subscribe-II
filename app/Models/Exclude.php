<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exclude extends Model
{
    use HasFactory;




    public function ingredients()
    {

        return $this->hasMany(Ingredient::class, 'excludeId');

    } // end function




    public function ingredientsList()
    {

        return $this->hasMany(ExcludeIngredient::class, 'excludeId');

    } // end function





} // end model




