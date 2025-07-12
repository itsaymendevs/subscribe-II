<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItemPurchase extends Model
{
    use HasFactory;





    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendorId');

    } // end function






    public function containers()
    {
        return $this->hasMany(StockItemPurchaseContainer::class, 'stockItemPurchaseId');

    } // end function





    public function labels()
    {
        return $this->hasMany(StockItemPurchaseLabel::class, 'stockItemPurchaseId');

    } // end function





    public function items()
    {
        return $this->hasMany(StockItemPurchaseItem::class, 'stockItemPurchaseId');

    } // end function







    // -------------------------------------------------------------------
    // -------------------------------------------------------------------







    public function totalBuyPrice()
    {


        // :: root
        $totalBuyPrice = 0;
        $items = $this->items()->get();
        $labels = $this->labels()->get();
        $containers = $this->containers()->get();





        // 1: loop - items
        foreach ($items ?? [] as $item)
            $totalBuyPrice += $item->buyPrice * $item->quantity;



        foreach ($labels ?? [] as $label)
            $totalBuyPrice += $label->buyPrice * $label->quantity;



        foreach ($containers ?? [] as $container)
            $totalBuyPrice += $container->buyPrice * $container->quantity;






        return doubleval($totalBuyPrice);


    } // end function





} // end model
