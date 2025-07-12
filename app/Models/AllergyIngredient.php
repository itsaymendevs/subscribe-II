<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllergyIngredient extends Model
{
    use HasFactory;



    public function ingredient()
    {

        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function





    public function allergy()
    {

        return $this->belongsTo(Allergy::class, 'allergyId');

    } // end function



} // end model




