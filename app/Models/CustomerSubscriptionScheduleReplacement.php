<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionScheduleReplacement extends Model
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







    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function





    public function replacement()
    {

        return $this->belongsTo(Meal::class, 'replacementId');

    } // end function




} // end model
