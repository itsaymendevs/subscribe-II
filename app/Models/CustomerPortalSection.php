<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPortalSection extends Model
{
    use HasFactory;



    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');

    } // end function





    public function content()
    {
        return $this->hasOne(CustomerPortalSectionContent::class, 'customerPortalSectionId');

    } // end function



    public function style()
    {

        return $this->hasOne(CustomerPortalSectionStyle::class, 'customerPortalSectionId');

    } // end function







} // end model
