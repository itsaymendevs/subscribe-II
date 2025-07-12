<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSubscriptionPause extends Model
{
    use HasFactory;




    public function walletDeposit()
    {

        return $this->hasOne(CustomerWalletDeposit::class, 'subscriptionPauseId');

    } // end function








    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------
    // -----------------------------------------------------------










} // end model
