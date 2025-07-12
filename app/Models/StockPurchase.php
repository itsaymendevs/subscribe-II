<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPurchase extends Model
{
    use HasFactory;



    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierId');

    } // end function






    public function ingredients()
    {
        return $this->hasMany(StockPurchaseIngredient::class, 'stockPurchaseId');

    } // end function






    public function totalBuyPrice()
    {


        // :: get ingredients - initTotalBuyPrice
        $purchaseIngredients = $this->ingredients()->get();
        $totalBuyPrice = 0;


        // loop - purchaseIngredients
        foreach ($purchaseIngredients as $purchaseIngredient) {

            $totalBuyPrice += $purchaseIngredient->buyPrice * $purchaseIngredient->quantity;

        } // end loop




        return doubleval($totalBuyPrice);


    } // end function





} // end model
