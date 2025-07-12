<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionIngredient extends Model
{
    use HasFactory;



    public function ingredient()
    {

        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function






    public function cookingType()
    {

        return $this->belongsTo(CookingType::class, 'cookingTypeId');

    } // end function





} // end model
