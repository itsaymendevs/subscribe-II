<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SubscriptionSectionStyleForm extends Form
{

    #[Validate('required')]
    public $subscriptionSectionId;



    // 1: colors
    public $titleColor, $secondTitleColor, $thirdTitleColor, $fourthTitleColor;

    public $subtitleColor, $secondSubtitleColor, $thirdSubtitleColor, $fourthSubtitleColor;

    public $captionColor, $secondCaptionColor, $thirdCaptionColor, $fourthCaptionColor;

    public $buttonColor, $secondButtonColor, $thirdButtonColor, $fourthButtonColor;

    public $buttonActiveColor, $secondButtonActiveColor, $thirdButtonActiveColor, $fourthButtonActiveColor;




    // ------------------------------------------
    // ------------------------------------------



    // 2: borders
    public $titleBorderColor, $secondTitleBorderColor, $thirdTitleBorderColor, $fourthTitleBorderColor;

    public $subtitleBorderColor, $secondSubtitleBorderColor, $thirdSubtitleBorderColor, $fourthSubtitleBorderColor;

    public $captionBorderColor, $secondCaptionBorderColor, $thirdCaptionBorderColor, $fourthCaptionBorderColor;

    public $buttonBorderColor, $secondButtonBorderColor, $thirdButtonBorderColor, $fourthButtonBorderColor;

    public $buttonBorderActiveColor, $secondButtonBorderActiveColor, $thirdButtonBorderActiveColor, $fourthButtonBorderActiveColor;

    public $sectionBorderColor;





    // ------------------------------------------
    // ------------------------------------------




    // 3: backgrounds



    public $buttonBackground, $secondButtonBackground, $thirdButtonBackground, $fourthButtonBackground;

    public $buttonActiveBackground, $secondButtonActiveBackground, $thirdButtonActiveBackground, $fourthButtonActiveBackground;

    public $cardBackground, $secondCardBackground, $thirdCardBackground, $fourthCardBackground;

    public $cardActiveBackground, $secondCardActiveBackground, $thirdCardActiveBackground, $fourthCardActiveBackground;

    public $sectionBackground;






    // ------------------------------------------
    // ------------------------------------------




    // 4: radius

    public $buttonRadius, $secondButtonRadius, $thirdButtonRadius, $fourthButtonRadius;

    public $buttonActiveRadius, $secondButtonActiveRadius, $thirdButtonActiveRadius, $fourthButtonActiveRadius;

    public $cardRadius, $secondCardRadius, $thirdCardRadius, $fourthCardRadius;

    public $cardActiveRadius, $secondCardActiveRadius, $thirdCardActiveRadius, $fourthCardActiveRadius;

    public $sectionRadius;




    // ------------------------------------------
    // ------------------------------------------





    // 5: margin
    public $marginTop, $marginBottom;



    // 4.5: padding
    public $paddingTop, $paddingBottom;





    public $id;


} // end form
