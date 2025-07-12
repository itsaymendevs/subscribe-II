<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;


    public function districts()
    {
        return $this->hasMany(ZoneDistrict::class, 'zoneId');

    } // end function






    public function districtsInArray()
    {


        // 1: getZones - loop
        $districtsInArray = [];

        $zoneDistricts = $this->districts()->get();

        foreach ($zoneDistricts as $zoneDistrict) {
            array_push($districtsInArray, $zoneDistrict->district->name);
        }


        return $districtsInArray ? $districtsInArray : ['Not Assigned'];


    } // end function








    public function districtsForTooltips()
    {


        // 1: getZones - convertToString
        $zoneDistricts = $this->districtsInArray();
        $zoneDistricts = implode('<br />', $zoneDistricts);

        return $zoneDistricts;


    } // end function




} // end model
