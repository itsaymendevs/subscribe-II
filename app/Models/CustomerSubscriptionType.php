<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionType extends Model
{
    use HasFactory;




    public function mealType()
    {

        return $this->belongsTo(MealType::class, 'mealTypeId');

    } // end function




    public function type()
    {

        return $this->belongsTo(Type::class, 'typeId');

    } // end function



    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function




    public function subscription()
    {

        return $this->belongsTo(CustomerSubscription::class, 'customerSubscriptionId');

    } // end function









} // end model
