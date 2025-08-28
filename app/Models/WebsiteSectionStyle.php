<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSectionStyle extends Model
{
   use HasFactory;


   public function portalSection()
   {

      return $this->belongsTo(WebsiteSection::class, 'websiteSectionId');

   } // end function



} // end model
