<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;



    public function meals()
    {

        return $this->hasMany(MealMenu::class, 'menuId');

    } // end function




    public function subMenus()
    {

        return $this->hasMany(MenuSub::class, 'menuId');

    } // end function


} // end model
