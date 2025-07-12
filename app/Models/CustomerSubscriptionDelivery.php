<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionDelivery extends Model
{
    use HasFactory;





    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function






    public function subscription()
    {

        return $this->belongsTo(CustomerSubscription::class, 'customerSubscriptionId');

    } // end function





    public function driver()
    {

        return $this->belongsTo(Driver::class, 'driverId');

    } // end function







    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');

    } // end function





    public function schedule()
    {

        return $this->hasOne(CustomerSubscriptionSchedule::class, 'customerSubscriptionDeliveryId');

    } // end function






} // end model
