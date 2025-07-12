<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DriverForm extends Form
{
    // :: variables
    public $id, $name, $phone, $email, $license, $password, $imageFile, $licenseFile, $licenseRearFile, $shiftTypeId, $vehicleId;



    // :: helper
    public $imageFileName, $licenseFileName, $licenseRearFileName;


    // :: relations
    public $zones = [];



} // end form
