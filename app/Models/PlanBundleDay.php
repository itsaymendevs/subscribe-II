<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundleDay extends Model
{
    use HasFactory;



    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function










    // ---------------------------------------------
    // ---------------------------------------------







    public function rangesByDiscount()
    {


        // :: root
        $rangesByDiscount = [];



        // 1: getBundle
        $bundle = $this->bundle()->first();


        // loop - rangesByPrice
        foreach ($bundle->rangesByPrice as $bundleRange) {



            // 1.2: getDiscount - appendDiscount
            $discountPrice = ($bundleRange->pricePerDay * $this->days) * (($this->discount ?? 0) / 100);
            $adjustorPrice = ($bundleRange->pricePerDay * $this->days) * (($this->adjustor ?? 0) / 100);

            $priceByDiscount = round(($bundleRange->pricePerDay * $this->days) - ($discountPrice + $adjustorPrice));


            array_push($rangesByDiscount, "&#8226; {$bundleRange->range->name} / {$priceByDiscount} AED");


        } // end loop







        return $rangesByDiscount ?? ['No Ranges Found!'];


    } // end function




} // end model
