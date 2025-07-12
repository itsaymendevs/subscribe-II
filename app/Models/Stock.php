<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;





    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredientId');

    } // end function






    public function purchase()
    {
        return $this->belongsTo(StockPurchase::class, 'stockPurchaseId');

    } // end function








} // end class
