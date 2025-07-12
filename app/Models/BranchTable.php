<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchTable extends Model
{
    use HasFactory;


    public function branch()
    {

        return $this->belongsTo(Branch::class, 'branchId');

    } // end function



} // end model
