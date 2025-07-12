<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartToGoSectionContent extends Model
{
    use HasFactory;


    public function portalSection()
    {

        return $this->belongsTo(CartToGoSection::class, 'cartToGoSectionId');

    } // end function




} // end model
