<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCodePlan extends Model
{
    use HasFactory;



    public function promoCode()
    {

        return $this->belongsTo(PromoCode::class, 'promoCodeId');

    } // end function




    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function




} // end model
