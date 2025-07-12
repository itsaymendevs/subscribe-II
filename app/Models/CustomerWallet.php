<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Model
{
    use HasFactory;





    public function deposits()
    {

        return $this->hasMany(CustomerWalletDeposit::class, 'walletId');

    } // end function






} // end model
