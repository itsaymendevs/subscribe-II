<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSection extends Model
{
   use HasFactory;




   public function section()
   {
      return $this->belongsTo(Section::class, 'sectionId');

   } // end function





   public function content()
   {
      return $this->hasOne(WebsiteSectionContent::class, 'websiteSectionId');

   } // end function



   public function style()
   {

      return $this->hasOne(WebsiteSectionStyle::class, 'websiteSectionId');

   } // end function







} // end model
