<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDeliveryDay extends Model
{
    use HasFactory;



    public function customerAddress()
    {

        return $this->belongsTo(CustomerAddress::class, 'customerAddressId');

    } // end function






} // end model
