<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartToGoSection extends Model
{
    use HasFactory;




    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');

    } // end function





    public function content()
    {
        return $this->hasOne(CartToGoSectionContent::class, 'cartToGoSectionId');

    } // end function



    public function style()
    {

        return $this->hasOne(CartToGoSectionStyle::class, 'cartToGoSectionId');

    } // end function







} // end model
