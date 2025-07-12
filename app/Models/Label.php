<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;



    public function containers()
    {

        return $this->hasMany(LabelContainer::class, 'labelId');

    } // end function





} // end model
