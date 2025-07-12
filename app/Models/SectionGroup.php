<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionGroup extends Model
{
    use HasFactory;


    public function sections()
    {
        return $this->hasMany(Section::class, 'sectionGroupId');

    } // end function



} // end model
