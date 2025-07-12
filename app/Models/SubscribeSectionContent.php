<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeSectionContent extends Model
{
    use HasFactory;



    public function portalSection()
    {

        return $this->belongsTo(SubscribeSection::class, 'subscribeSectionId');

    } // end function




} // end model


