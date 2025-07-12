<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPortalSectionContent extends Model
{
    use HasFactory;



    public function portalSection()
    {

        return $this->belongsTo(CustomerPortalSection::class, 'customerPortalSectionId');

    } // end function




} // end model




