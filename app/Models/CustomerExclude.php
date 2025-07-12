<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerExclude extends Model
{
    use HasFactory;




    public function customer()
    {

        return $this->belongsTo(Customer::class, 'customerId');

    } // end function






    public function exclude()
    {

        return $this->belongsTo(Exclude::class, 'excludeId');

    } // end function





} // end model
