<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionSectionContent extends Model
{
    use HasFactory;



    public function subscriptionSection()
    {

        return $this->belongsTo(SubscriptionSection::class, 'subscriptionSectionId');

    } // end function




} // end model



