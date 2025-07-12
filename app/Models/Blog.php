<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;



    public function tags()
    {

        return $this->hasMany(BlogTag::class, 'blogId');

    } // end function





    public function references()
    {

        return $this->hasMany(BlogReference::class, 'blogId');

    } // end function





    public function sections()
    {

        return $this->hasMany(BlogSection::class, 'blogId');

    } // end function





} // end model
