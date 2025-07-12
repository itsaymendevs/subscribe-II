<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcludeIngredient extends Model
{
    use HasFactory;





    public function ingredient()
    {

        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function





    public function exclude()
    {

        return $this->belongsTo(Exclude::class, 'excludeId');

    } // end function



} // end model
