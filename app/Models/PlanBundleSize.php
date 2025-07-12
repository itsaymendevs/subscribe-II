<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundleSize extends Model
{
    use HasFactory;



    public function size()
    {

        return $this->belongsTo(Size::class, 'sizeId');

    } // end function





    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function







} // end model
