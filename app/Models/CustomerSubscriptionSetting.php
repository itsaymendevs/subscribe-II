<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionSetting extends Model
{
    use HasFactory;



    public function paymentMethod()
    {

        return $this->belongsTo(PaymentMethod::class, 'paymentMethodId');

    } // end function


} // end model
