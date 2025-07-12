<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionSection extends Model
{
    use HasFactory;



    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');

    } // end function





    public function content()
    {
        return $this->hasOne(SubscriptionSectionContent::class, 'subscriptionSectionId');

    } // end function



    public function style()
    {

        return $this->hasOne(SubscriptionSectionStyle::class, 'subscriptionSectionId');

    } // end function







} // end model



