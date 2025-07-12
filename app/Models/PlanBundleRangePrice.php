<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundleRangePrice extends Model
{
    use HasFactory;


    public function bundle()
    {

        return $this->belongsTo(PlanBundle::class, 'planBundleId');

    } // end function




    public function range()
    {

        return $this->belongsTo(PlanRange::class, 'planRangeId');

    } // end function



} // end model
