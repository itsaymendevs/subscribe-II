<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierIngredient extends Model
{
    use HasFactory;



    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierId', 'id');

    } // end function



    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function




    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitId');

    } // end function





} // end model
