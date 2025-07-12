<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSection extends Model
{
    use HasFactory;


    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');

    } // end function





    public function content()
    {
        return $this->hasOne(LandingSectionContent::class, 'landingSectionId', 'id');

    } // end function



    public function style()
    {

        return $this->hasOne(LandingSectionStyle::class, 'landingSectionId');

    } // end function







} // end model
