<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanBundleRange extends Model
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






    public function types()
    {

        return $this->hasMany(PlanBundleRangeType::class, 'planBundleRangeId', 'id');

    } // end function







    public function typeByMealType($id)
    {

        return $this->types()?->where('mealTypeId', $id)?->first() ?? null;


    } // end function






} // end model

