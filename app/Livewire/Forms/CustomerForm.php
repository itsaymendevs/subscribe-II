<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{


    // :: general
    public $id, $phone, $phoneKey, $email, $emailProvider, $name, $firstName, $lastName, $height, $weight, $whatsapp, $whatsappKey, $gender, $newPassword, $birthDate, $isVIP, $isActive, $isEnabled, $bagRemarks;



    public $allergyLists = [], $excludeLists = [];
    public $managerId, $driverId;














} // end form
