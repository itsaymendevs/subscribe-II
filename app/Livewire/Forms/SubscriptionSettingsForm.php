<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SubscriptionSettingsForm extends Form
{


    // :: variables
    public $id, $template, $textColor, $preloaderLineColor, $cursorColor, $cursorHoverColor, $planCardTitleColor, $planCardSubtitleColor, $planCardCaptionColor, $planCardHrColor, $planCardButtonColor, $planCardButtonHoverColor, $navbarMenuColor, $navbarMenuActiveColor, $navbarLinksColor, $navbarLinksHoverColor, $navbarSocialLinksColor, $sliderLineColor, $sliderBulletsColor, $sliderShadowColor, $planSideTitleColor, $planFilterLinksColor, $planFilterLinksHoverBorderColor, $planListNumbersColor, $planMealDietColor, $planReviewsTitleColor, $planMealsBorderColor, $planMealsHoverBorderColor, $planActionButtonColor;



    public $bodyBackgroundColor, $planCardBackgroundColor, $planCardButtonBackgroundColor, $navbarBackgroundColor, $planHeaderBackgroundColor, $planActionButtonBackgroundColor;


    public $planSliderArrows, $planSideTitleDisplay, $planCardRadius, $planCardAlignment;

    public $showPlanReviews, $showPlanCustomSection, $showPlanMealsTypeFilter;





    // 1.2: testimonials
    public $planReviewsKey;




    // 1.3: custom
    public $planCustomSectionVideoURL, $planCustomSectionTitle, $planCustomSectionImageFile, $planCustomSectionSecondImageFile, $planCustomSectionThirdImageFile, $planCustomSectionFourthImageFile, $planCustomSectionFifthImageFile, $planCustomSectionSixthImageFile;


    public $planCustomSectionImageFileName, $planCustomSectionSecondImageFileName, $planCustomSectionThirdImageFileName, $planCustomSectionFourthImageFileName, $planCustomSectionFifthImageFileName, $planCustomSectionSixthImageFileName;


    public $planCustomSectionSubtitle, $planCustomSectionCaption, $planCustomSectionSecondSubtitle, $planCustomSectionSecondCaption, $planCustomSectionThirdSubtitle, $planCustomSectionThirdCaption, $planCustomSectionFourthSubtitle, $planCustomSectionFourthCaption, $planCustomSectionFifthSubtitle, $planCustomSectionFifthCaption, $planCustomSectionSixthSubtitle, $planCustomSectionSixthCaption;




} // end class
