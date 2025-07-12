<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;


    public function ingredients()
    {
        return $this->hasMany(SupplierIngredient::class, 'supplierId');

    } // end function





    public function categories()
    {
        return $this->hasMany(SupplierCategory::class, 'supplierId');

    } // end function









    // -----------------------------------------------







    public function categoriesInArray()
    {



        // 1: getCategories
        $categoriesIds = $this?->categories()?->get()?->pluck('categoryId')?->toArray() ?? [];
        $categoriesInArray = IngredientCategory::whereIn('id', $categoriesIds)?->pluck('name')?->toArray() ?? [''];


        return $categoriesInArray;


    } // end function









} // end model
