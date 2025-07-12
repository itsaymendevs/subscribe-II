<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{

    // :: variables
    public $id, $name, $email, $phone, $locationAddress, $imageFile, $imageFileDark, $preloaderImageFile, $fontLinks, $textFont, $headingFont, $clientURL, $serverURL, $websiteURL, $plansURL, $applicationURL, $cityId, $cityDistrictId;




    // :: helper
    public $imageFileName, $imageFileDarkName, $preloaderImageFileName;

} // end form
