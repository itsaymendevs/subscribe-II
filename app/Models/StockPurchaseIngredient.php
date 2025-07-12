<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPurchaseIngredient extends Model
{
    use HasFactory;



    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function




    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitId');

    } // end function






    public function stockPurchase()
    {
        return $this->belongsTo(StockPurchase::class, 'stockPurchaseId');

    } // end function




} // end model
