<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeSection extends Model
{
    use HasFactory;





    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');

    } // end function





    public function content()
    {
        return $this->hasOne(SubscribeSectionContent::class, 'subscribeSectionId');

    } // end function



    public function style()
    {

        return $this->hasOne(SubscribeSectionStyle::class, 'subscribeSectionId');

    } // end function







} // end model


