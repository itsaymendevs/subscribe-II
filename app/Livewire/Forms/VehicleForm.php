<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VehicleForm extends Form
{

    // :: variables
    public $id, $name, $type, $issueDate, $expiryDate, $plate, $imageFile, $plateFile, $insuranceFile, $ownershipFile;



    // :: helper
    public $imageFileName, $licenseFileName, $plateFileName, $insuranceFileName, $ownershipFileName;



    // :: relation
    public $drivers = [];


} // end form
