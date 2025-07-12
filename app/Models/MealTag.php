<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealTag extends Model
{
    use HasFactory;


    public function tag()
    {

        return $this->belongsTo(Tag::class, 'tagId');

    } // end function


} // end class
