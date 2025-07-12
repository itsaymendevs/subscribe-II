<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    public function group()
    {

        return $this->belongsTo(SectionGroup::class, 'sectionGroupId');

    } // end function







    public function inLanding()
    {


        $landingSections = LandingSection::where('sectionId', $this->id)?->count();

        return $landingSections > 0 ? true : false;


    } // end function






    public function inSubscription($isFor)
    {

        $subscriptionSections = SubscriptionSection::where('sectionId', $this->id)
                ?->where('isFor', $isFor)?->count();

        return $subscriptionSections > 0 ? true : false;


    } // end function




} // end model
