<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;


    public function plan()
    {

        return $this->belongsTo(Plan::class, 'planId');


    } // end function






    // --------------------------------------------------------
    // --------------------------------------------------------
    // --------------------------------------------------------
    // --------------------------------------------------------






    public function fullName()
    {

        return $this->firstName . ' ' . $this->lastName;

    } // end function







} // end model
