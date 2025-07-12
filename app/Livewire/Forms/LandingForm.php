<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LandingForm extends Form
{



    // 1: step I
    public $textFont, $headingFont, $extraFont, $fontLinks, $imageFile, $imageFileDark, $preloaderImageFile;



    // :: helpers
    public $imageFileName, $imageFileDarkName, $preloaderImageFileName;






    // 2: step II
    public $instagramURL, $facebookURL, $twitterURL, $snapchatURL, $tiktokURL, $linkedInURL;




    // 3: step II
    public $layout;




} // end form
