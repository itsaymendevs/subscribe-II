<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;



    public function ingredients()
    {

        return $this->hasMany(ConversionIngredient::class, 'conversionId');

    } // end function





} // end model
