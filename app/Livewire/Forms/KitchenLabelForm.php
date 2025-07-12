<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class KitchenLabelForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $charge, $width, $height;



    // :: extra
    public $id, $desc, $footerImageFile, $imageFile, $isVertical;




    // :: show / Hide
    public $showCustomerName, $showMealName, $showMealMacros, $showProductionDate, $showExpiryDate, $showFooterImageFile, $showInstructions;

    public $hideTopBorders, $hideMacroBorders, $hideMacroTitles, $hideProductionTitles, $hideFooter;





    // :: colors - padding - radius
    public $caloriesColor, $carbsColor, $fatsColor, $proteinsColor, $backgroundColor, $fontColor, $labelBackgroundColor, $borderColor;

    public $paddingLeft, $paddingRight, $paddingTop, $paddingBottom;
    public $marginLeft, $marginRight, $marginTop, $marginBottom;

    public $marginLeftHeader, $marginBottomHeader;
    public $marginLeftMiddle, $marginBottomMiddle;


    public $radius, $macroRadius;




    // :: helper
    public $imageFileName, $footerImageFileName;





    // relations
    public $containers = [];




    // -----------------------------
    // -----------------------------






    // :: NOT ACTIVE

    public $showQRCode, $showPrice, $showAllergy, $showMealRemarks, $showServingInstructions;



} // end form
