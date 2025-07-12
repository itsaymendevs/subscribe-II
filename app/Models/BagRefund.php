<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagRefund extends Model
{
    use HasFactory;


    public function subscription()
    {

        return $this->belongsTo(CustomerSubscription::class, 'customerSubscriptionId');

    } // end function





    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function








} // end model
