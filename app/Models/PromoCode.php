<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;


    public function plans()
    {

        return $this->hasMany(PromoCodePlan::class, 'promoCodeId');

    } // end function




} // end model
