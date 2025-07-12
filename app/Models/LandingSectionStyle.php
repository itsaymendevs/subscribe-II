<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSectionStyle extends Model
{
    use HasFactory;



    public function landingSection()
    {

        return $this->belongsTo(LandingSection::class, 'landingSectionId');

    } // end function




} // end model
