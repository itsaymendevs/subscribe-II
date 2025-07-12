<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorLabel extends Model
{
    use HasFactory;

    public function item()
    {

        return $this->belongsTo(Label::class, 'labelId');

    } // end function



    public function unit()
    {

        return $this->belongsTo(Unit::class, 'unitId');

    } // end function




} // end model
