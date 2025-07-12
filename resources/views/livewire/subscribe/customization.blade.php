<div>




    {{-- colors --}}
    <livewire:subscribe.components.colors key='colors' />




    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}






    {{-- 1: plans --}}
    <section class="blog2 section-padding ">
        <div class="container">



            {{-- row --}}
            <div class="row">





                {{-- tabs --}}
                <div class="col-12">
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist" wire:ignore>


                        {{-- loop - categories --}}
                        @foreach ($planCategories ?? [] as $key => $planCategory)

                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if ($key == 0) active @endif" id="pills-{{ $key+1 }}-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-{{ $key+1 }}" type="button" role="tab"
                                aria-controls="pills-{{ $key+1 }}">{{ $planCategory?->name }}</button>
                        </li>

                        @endforeach
                        {{-- end loop --}}





                    </ul>
                    {{-- endNavLinks --}}






                    {{-- ----------------------------------- --}}
                    {{-- ----------------------------------- --}}
                    {{-- ----------------------------------- --}}
                    {{-- ----------------------------------- --}}







                    {{-- tabContent --}}
                    <div class="tab-content" id="pills-tabContent">


                        {{-- loop - planCategories --}}
                        @foreach ($planCategories ?? [] as $key => $planCategory)


                        <div class="tab-pane fade @if ($key == 0) show active @endif" id="pills-{{ $key+1 }}"
                            role="tabpanel" aria-labelledby="pills-{{ $key+1 }}-tab" tabindex="0" wire:ignore.self>



                            {{-- title --}}
                            <div class="d-block text-center mb-30">
                                <div class="section-subtitle">{{ env('APP_CLIENT_NAME') }}</div>
                                <div class="section-title"><span class='fw-700'>{{ $planCategory?->name }}</span></div>
                            </div>




                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}



                            {{-- slider --}}
                            <div class="d-block">
                                <div class="owl-carousel owl-theme" wire:ignore>



                                    {{-- loop - plans --}}
                                    @foreach ($plans?->where('planCategoryId', $planCategory?->id) ?? [] as $plan)


                                    <label class="item item-plans
                                    @if ($pickedPlan?->id == $plan->id) active @endif"
                                        wire:loading.class='no-events-processing'
                                        key='single-plan-label-{{ $plan->id }}'>
                                        <img src="{{ $storagePath . 'menu/plans/' . $plan->imageFile }}"
                                            class="plans-img img-fluid" alt=""
                                            wire:click="changePlan('{{ $plan->id }}')" />
                                        <div class="bottom-fade"></div>

                                        {{-- details --}}
                                        <div class="title" wire:click="changePlan('{{ $plan->id }}')">
                                            <h6>{{ $plan?->desc }}</h6>
                                            <h4>{{ $plan?->name }}</h4>
                                        </div>




                                        {{-- -------------------------------- --}}
                                        {{-- -------------------------------- --}}



                                        {{-- curve --}}
                                        <div class="curv-butn icon-bg">


                                            {{-- select + price --}}
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target='#plan-details--modal' class="vid"
                                                wire:click="planDetails('{{ $plan->id }}')">
                                                <div class="icon">
                                                    <i class="icon-show"><span>{{ $plan?->startingPrice
                                                            }}<br /><i>Starts</i></span>
                                                    </i><i class="ti-info icon-hidden"></i>
                                                </div>
                                            </a>



                                            {{-- ---------------------------- --}}
                                            {{-- ---------------------------- --}}



                                            {{-- theCurv --}}
                                            <div class="br-left-top">
                                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-11 h-11">
                                                    <path
                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                        fill="#1b1b1b"></path>
                                                </svg>
                                            </div>
                                            <div class="br-right-bottom">
                                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-11 h-11">
                                                    <path
                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                        fill="#1b1b1b"></path>
                                                </svg>
                                            </div>


                                        </div>
                                    </label>

                                    @endforeach
                                    {{-- endSlide --}}


                                </div>
                            </div>
                            {{-- endSlider --}}







                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}
                            {{-- --------------------------- --}}







                            {{-- planBundles --}}
                            <div class="team section-padding sm-fix">

                                {{-- title --}}
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="section-title mb-0">Choose your <span class='fw-700'>Bundle</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            {{-- endPlanBundles --}}













                            {{-- ------------------------------------------------------------- --}}
                            {{-- ------------------------------------------------------------- --}}
                            {{-- ------------------------------------------------------------- --}}
                            {{-- ------------------------------------------------------------- --}}







                            {{-- customization --}}
                            <form wire:submit='continue' class="car-details section-padding pt-4 mt-2">
                                <div class="row">



                                    {{-- customization --}}
                                    <div class="col-lg-9 col-md-12 ">






                                        {{-- slider + details --}}
                                        <div class="row team mb-4">

                                            {{-- slider --}}
                                            <div class="col-md-12">
                                                <div class="owl-carousel owl-theme" wire:ignore>


                                                    {{-- slide --}}
                                                    @foreach ($planBundles ?? [] as $planBundle)


                                                    <label class="item item-bundles"
                                                        key='single-plan-bundle-{{ $planBundle->id }}'
                                                        for='single-plan-bundle-{{ $planBundle->id }}'
                                                        wire:loading.class='no-events-processing'
                                                        wire:target='changePlanBundleRange, changePlanBundle'>


                                                        {{-- image --}}
                                                        <img src='{{ url("{$storagePath}menu/plans/bundles/{$planBundle->imageFile}") }}'
                                                            class="img-fluid" />
                                                        <div class="bottom-fade"></div>


                                                        <input type="radio" name="single-plan-bundles" class='d-none'
                                                            @if($pickedPlanBundle?->id ==
                                                        $planBundle->id) checked @endif
                                                        id="single-plan-bundle-{{ $planBundle->id }}" value='{{
                                                        $planBundle->id }}'
                                                        wire:change="changePlanBundle('{{ $planBundle->id }}')">



                                                        {{-- curve --}}
                                                        <div class="butn icon-bg no-events">


                                                            {{-- select --}}
                                                            <a href="javascript:void(0);" class="vid ">
                                                                <div class="icon"><i class="ti-arrow-top-right"></i>
                                                                </div>
                                                            </a>



                                                            {{-- theCurve --}}
                                                            <div class="br-left-top">
                                                                <svg viewBox="0 0 11 11" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-11 h-11">
                                                                    <path
                                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                                        fill="#1b1b1b"></path>
                                                                </svg>
                                                            </div>


                                                            <div class="br-right-bottom">
                                                                <svg viewBox="0 0 11 11" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-11 h-11">
                                                                    <path
                                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                                        fill="#1b1b1b"></path>
                                                                </svg>
                                                            </div>


                                                        </div>
                                                        {{-- endCurve --}}



                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}



                                                        {{-- details --}}
                                                        <div class="title">
                                                            <h4>{{ $planBundle->name }}</h4>
                                                            <h6>{{ $pickedPlanBundle->remarks ?? null }}</h6>
                                                        </div>
                                                    </label>


                                                    @endforeach
                                                    {{-- endSlide --}}





                                                </div>
                                            </div>




                                            {{-- ---------------------------- --}}
                                            {{-- ---------------------------- --}}


                                            {{-- details --}}
                                            <div class="col-12 d-block d-lg-none mt-4">
                                                <div class="sidebar-car">




                                                    {{-- in-details --}}
                                                    <div class="item pb-0 mb-2">


                                                        {{-- loop - types --}}
                                                        @foreach ($pickedPlanBundle->typesInObjectForCheckout() ??
                                                        [] as $typeName => $typeCount)

                                                        <div class="features bundle-details">
                                                            <span><i class="ti-check"></i> {{
                                                                ucwords($typeName)
                                                                }}</span>
                                                            <p>{{ $typeCount }}</p>
                                                        </div>

                                                        @endforeach
                                                        {{-- end loop --}}






                                                        {{-- -------------------------------- --}}
                                                        {{-- -------------------------------- --}}




                                                        {{-- buttons --}}
                                                        <div class="btn-double mt-3 mb-4" data-grouptype="&amp;">

                                                            {{-- confirm --}}
                                                            <a href="#0">Consult</a>

                                                            {{-- customize --}}
                                                            <a href="javascript:void(0);" disabled>Customize</a>

                                                        </div>
                                                        {{-- endButtons --}}


                                                    </div>
                                                    {{-- endItem --}}






                                                    {{-- -------------------------------- --}}
                                                    {{-- -------------------------------- --}}




                                                    {{-- price --}}
                                                    <div class="title summary-per-day">
                                                        <h4>AED {{ $this->instance->totalCheckoutPrice ?? 0 }}
                                                            <span>/ total price</span>
                                                        </h4>
                                                    </div>



                                                </div>
                                            </div>
                                            {{-- endSummary --}}



                                        </div>
                                        {{-- endSlider --}}






                                        {{-- ----------------------------------------------- --}}
                                        {{-- ----------------------------------------------- --}}
                                        {{-- ----------------------------------------------- --}}






                                        {{-- dropdowns --}}
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <ul class="accordion-box clearfix">


                                                    {{-- planDetails --}}
                                                    <li class="accordion block active-block" wire:ignore.self>
                                                        <div class="acc-btn collapse--title active" wire:ignore.self>
                                                            <span class="count">1.</span> Plan Details
                                                        </div>
                                                        <div class="acc-content" style="display: block;"
                                                            wire:ignore.self>
                                                            <div class="content">

                                                                {{-- row --}}
                                                                <div class="row align-items-end">


                                                                    {{-- left --}}
                                                                    <div class="col-12 col-md-6">


                                                                        {{-- row --}}
                                                                        <div class="row">



                                                                            {{-- planDays --}}
                                                                            <div class="col-12 mb-4">
                                                                                <label
                                                                                    class='form--label d-block mb-1'>Plan
                                                                                    Days</label>


                                                                                {{-- single --}}

                                                                                {{-- loop - planDays --}}
                                                                                @foreach ($planBundleDays ?? []
                                                                                as $key => $planBundleDay)


                                                                                <label class='selection--label for-days'
                                                                                    for='planDays-{{ $key }}'
                                                                                    wire:loading.class='no-events-processing'
                                                                                    wire:target='changePlanBundleRange, changePlanBundle, changePlan, changePlanDays'>{{
                                                                                    $planBundleDay->days }}


                                                                                    <input type="radio" class='d-none'
                                                                                        name="planDays"
                                                                                        wire:model='instance.planDays'
                                                                                        wire:change='changePlanDays'
                                                                                        id="planDays-{{ $key }}"
                                                                                        value='{{ $planBundleDay->days }}'>

                                                                                </label>

                                                                                @endforeach
                                                                                {{-- end loop --}}



                                                                            </div>
                                                                            {{-- endPlanDays --}}






                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}










                                                                            {{-- calorieRanges --}}
                                                                            <div class="col-12 mb-4">


                                                                                <label
                                                                                    class='form--label d-block mb-1'>Calorie
                                                                                    Range</label>


                                                                                {{-- loop - planBundleRanges --}}
                                                                                @foreach ($planBundleRanges ?? []
                                                                                as $planBundleRange)



                                                                                {{-- checkOGRange --}}
                                                                                @if($planBundleRange->range->isForWebsite
                                                                                == true &&
                                                                                $planBundleRange?->range?->name
                                                                                != 'Customized')


                                                                                <label class='selection--label'
                                                                                    for='planBundleRange-{{ $planBundleRange->id }}'
                                                                                    wire:click="changePlanBundleRange('{{ $planBundleRange->id }}')"
                                                                                    key='planBundleRange-{{ $planBundleRange->id }}'>{{
                                                                                    $planBundleRange->range->caloriesRange
                                                                                    }}

                                                                                    {{-- input --}}
                                                                                    <input type="radio" class='d-none'
                                                                                        name="planBundleRange"
                                                                                        @if($pickedPlanBundleRange->id
                                                                                    ==
                                                                                    $planBundleRange->id) checked
                                                                                    @endif
                                                                                    id="planBundleRange-{{
                                                                                    $planBundleRange->id }}"
                                                                                    value='{{ $planBundleRange->id
                                                                                    }}'>
                                                                                </label>


                                                                                @endif
                                                                                {{-- end if - checkOGRange --}}



                                                                                @endforeach
                                                                                {{-- end loop - planBundleRanges
                                                                                --}}


                                                                            </div>





                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}







                                                                            {{-- weekdays --}}
                                                                            <div class="col-12 mb-4">
                                                                                <label
                                                                                    class='form--label d-block mb-1'>Delivery
                                                                                    Weekdays</label>


                                                                                {{-- wrapper --}}
                                                                                <div
                                                                                    class="d-block @if ($instance->isExistingCustomer) no-events-processing @endif">


                                                                                    {{-- loop - deliveryDays --}}
                                                                                    @foreach ($weekDays ?? []
                                                                                    as $key => $weekDay)

                                                                                    <label
                                                                                        class='selection--label for-weekdays'
                                                                                        for='weekdays-{{ $key }}'
                                                                                        wire:loading.class='no-events-processing'>{{
                                                                                        $weekDay }}

                                                                                        <input type="checkbox"
                                                                                            class='d-none'
                                                                                            name="weekdays"
                                                                                            id="weekdays-{{ $key }}"
                                                                                            wire:model='instance.deliveryDays.{{ $weekDay }}'
                                                                                            value='{{ $weekDay }}'>

                                                                                    </label>

                                                                                    @endforeach
                                                                                    {{-- end loop --}}


                                                                                </div>
                                                                                {{-- endWrapper --}}

                                                                            </div>
                                                                            {{-- endWeekdays --}}




                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}
                                                                            {{-- ----------------------------- --}}



                                                                            {{-- startDate --}}
                                                                            <div class="col-12" wire:ignore>
                                                                                <label class='form--label'>Start
                                                                                    Date</label>
                                                                                <input type="text"
                                                                                    class="form-control input input-regular mb-0 datepicker"
                                                                                    wire:model='instance.startDate'
                                                                                    @if($instance->initStartDate)
                                                                                min='{{ $instance->initStartDate }}'
                                                                                @endif
                                                                                required>
                                                                            </div>






                                                                        </div>
                                                                        {{-- endRow --}}


                                                                    </div>




                                                                    {{-- --------------------------- --}}
                                                                    {{-- --------------------------- --}}




                                                                    {{-- right --}}
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="bag-wrapper">
                                                                            <img src='{{ url("{$storagePath}bags/{$bag->imageFile}") }}'
                                                                                alt="">
                                                                            <h6 class='for-deposit mb-2'>Deposit {{
                                                                                number_format($bag->price ?? 0) }}
                                                                                AED</h6>


                                                                            {{-- checkbox --}}
                                                                            <div
                                                                                class="form-check checkbox-wrapper justify-content-center @if ($subscriptionSettings?->hasOptionalBag) no-events-loading @endif">

                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="bag-checkbox"
                                                                                    wire:change='changeBag'
                                                                                    value='{{ $bag->name }}'
                                                                                    wire:model='instance.bag'>

                                                                                <label class="form-check-label"
                                                                                    for="bag-checkbox">Add {{
                                                                                    $bag->name }}</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                {{-- endRow --}}



                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- endDeliveryDetails --}}




                                                    {{-- ---------------------------------- --}}
                                                    {{-- ---------------------------------- --}}
                                                    {{-- ---------------------------------- --}}





                                                    {{-- allergens - dislikes --}}
                                                    <li class="accordion block
                                                    @if ($instance?->isExistingCustomer) d-none @endif"
                                                        wire:ignore.self>
                                                        <div class="acc-btn" data-bs-toggle="modal"
                                                            data-bs-target="#excludes--modal" wire:ignore.self>
                                                            <span class="count">2.</span> Allergens & Dislikes
                                                        </div>
                                                    </li>
                                                    {{-- endTab --}}







                                                    {{-- ---------------------------------- --}}
                                                    {{-- ---------------------------------- --}}
                                                    {{-- ---------------------------------- --}}





                                                    {{-- personalDetails --}}
                                                    <li class="accordion block" wire:ignore.self>
                                                        <div class="acc-btn" wire:ignore.self>
                                                            <span class="count">3.</span> Personal Details
                                                        </div>
                                                        <div class="acc-content">
                                                            <div class="content
                                                            @if ($instance?->isExistingCustomer) no-events @endif">

                                                                {{-- row --}}
                                                                <div class="row">

                                                                    {{-- firstName --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label class='form--label d-block mb-1'>First
                                                                            Name</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.firstName' required>
                                                                    </div>




                                                                    {{-- lastName --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label class='form--label d-block mb-1'>Last
                                                                            Name</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.lastName' required>
                                                                    </div>




                                                                    {{-- email --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label class='form--label d-block mb-1'>Email
                                                                            Address</label>
                                                                        <input type="email"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.fullEmail' required>
                                                                    </div>




                                                                    {{-- phone --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label
                                                                            class='form--label d-block mb-1'>Phone</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.phone' pattern="[0-9]+"
                                                                            minlength="9" maxlength="9" required>
                                                                    </div>




                                                                    {{-- whatsapp --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label
                                                                            class='form--label d-block mb-1'>Whatsapp</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.whatsapp'
                                                                            pattern="[0-9]+" minlength="6"
                                                                            maxlength="10" required>
                                                                    </div>





                                                                    {{-- gender --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label
                                                                            class='form--label d-block mb-1'>Gender</label>
                                                                        <select class="select form-select"
                                                                            wire:model='instance.gender'>
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                        </select>
                                                                    </div>


                                                                </div>
                                                                {{-- endRow --}}






                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- endTab --}}








                                                    {{-- ---------------------------------- --}}
                                                    {{-- ---------------------------------- --}}
                                                    {{-- ---------------------------------- --}}





                                                    {{-- addressDetails --}}
                                                    <li class="accordion block" wire:ignore.self>
                                                        <div class="acc-btn" wire:ignore.self>
                                                            <span class="count">4.</span> Address Details
                                                        </div>
                                                        <div class="acc-content" wire:ignore.self>
                                                            <div class="content
                                                            @if ($instance?->isExistingCustomer) no-events @endif">

                                                                {{-- row --}}
                                                                <div class="row">


                                                                    {{-- city --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <div class="select1_wrapper mb-4">
                                                                            <label
                                                                                class='form--label d-block mb-1'>City</label>
                                                                            <div class="select1_inner" wire:ignore
                                                                                wire:loading.class='no-events-processing'>
                                                                                <select id='city--select'
                                                                                    class="select2 select form--select level--select level--one"
                                                                                    style="width: 100%"
                                                                                    data-trigger='true'
                                                                                    value="{{ $instance->cityId }}"
                                                                                    data-instance='instance.cityId'
                                                                                    data-level='city' data-id='1'
                                                                                    required>

                                                                                    {{-- loop - cities --}}
                                                                                    @foreach ($cities ?? [] as $city)

                                                                                    <option value="{{ $city->id }}">{{
                                                                                        $city->name }}</option>

                                                                                    @endforeach
                                                                                    {{-- end loop --}}

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>





                                                                    {{-- ----------------------------- --}}
                                                                    {{-- ----------------------------- --}}




                                                                    {{-- district --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <div class="select1_wrapper mb-4">
                                                                            <label
                                                                                class='form--label d-block mb-1'>District</label>
                                                                            <div class="select1_inner" wire:ignore
                                                                                wire:loading.class='no-events-processing'>
                                                                                <select
                                                                                    class="select2 select form--select level--select level--two"
                                                                                    data-trigger="true"
                                                                                    value="{{ $instance?->cityDistrictId }}"
                                                                                    data-instance='instance.cityDistrictId'
                                                                                    data-id='1' required
                                                                                    style="width: 100%">
                                                                                    <option value=""></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                    {{-- deliveryTime --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <div class="select1_wrapper mb-4">
                                                                            <label
                                                                                class='form--label d-block mb-1'>Delivery
                                                                                Time</label>
                                                                            <div class="select1_inner" wire:ignore
                                                                                wire:loading.class='no-events-loading'>
                                                                                <select
                                                                                    class="select2 select form--select level--select level--two-second"
                                                                                    style="width: 100%"
                                                                                    value="{{ $instance?->cityDeliveryTimeId }}"
                                                                                    data-trigger="true" data-id='1'
                                                                                    data-instance='instance.cityDeliveryTimeId'
                                                                                    required>
                                                                                    <option value=""></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    {{-- ---------------------------- --}}
                                                                    {{-- ---------------------------- --}}




                                                                    {{-- location --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label class='form--label d-block mb-1'>Location
                                                                            Address</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.locationAddress'
                                                                            required>
                                                                    </div>




                                                                    {{-- apartment --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label
                                                                            class='form--label d-block mb-1'>Apartment
                                                                            / Villa</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.apartment' required>
                                                                    </div>




                                                                    {{-- floorNumber --}}
                                                                    <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                                                                        <label class='form--label d-block mb-1'>Floor
                                                                            No.</label>
                                                                        <input type="text"
                                                                            class="form-control input input-regular mb-4"
                                                                            wire:model='instance.floor' required>
                                                                    </div>



                                                                </div>
                                                                {{-- endRow --}}






                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- endTab --}}



                                                </ul>
                                            </div>
                                        </div>








                                        {{-- ------------------------------------ --}}
                                        {{-- ------------------------------------ --}}





                                        {{-- summary --}}
                                        <div class="row">
                                            <div class="col-12 d-block d-lg-none mt-4">
                                                <div class="sidebar-car">





                                                    {{-- promo --}}
                                                    <div class="item pb-0 mb-2">


                                                        {{-- promo --}}
                                                        <input type="text" class="form-control input input-regular mb-4 text-center
                                                @if ($instance->promoCodeDiscountPrice > 0) active @endif"
                                                            wire:model='instance.promoCode'
                                                            wire:loading.class='no-events-processing'
                                                            wire:change.live='checkPromo()' placeholder="Discount Code">





                                                        {{-- referral --}}
                                                        @if ($versionPermission?->salesModuleHasReferrals)


                                                        <input type="text"
                                                            class="form-control input input-regular mb-4 text-center"
                                                            wire:model='instance.referralCode'
                                                            wire:loading.class='no-events-processing'
                                                            placeholder="Referral Code" disabled>

                                                        @endif
                                                        {{-- end if --}}




                                                        <div class="summary--hr "></div>

                                                    </div>
                                                    {{-- endPromo --}}




                                                    {{-- -------------------------------- --}}
                                                    {{-- -------------------------------- --}}
                                                    {{-- -------------------------------- --}}
                                                    {{-- -------------------------------- --}}






                                                    {{-- plan-options --}}
                                                    <div class="item pt-4">




                                                        {{-- loop - types --}}
                                                        <div class="summary--section mb-2">
                                                            <div class="summary--line text-center main">
                                                                <p>{{$pickedPlan?->name}}</p>
                                                                <p>{{ $pickedPlanBundle?->name}}</p>
                                                                <p class='text--secondary'>{{
                                                                    $pickedPlanBundleRange?->range?->name}}</p>
                                                            </div>
                                                        </div>





                                                        {{-- loop - types --}}
                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Plan</p>
                                                                <h6>{{ $instance->totalPlanBundleRangePrice ?
                                                                    number_format($instance?->totalPlanBundleRangePrice
                                                                    -
                                                                    ($instance?->planBundleRangeAdjustmentPrice ?? 0)) :
                                                                    '' }}
                                                                </h6>
                                                            </div>
                                                        </div>



                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}




                                                        {{-- discount --}}
                                                        @if ($instance->planBundleRangeDiscountPrice)

                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Discount</p>
                                                                <h6>{{
                                                                    number_format($instance?->planBundleRangeDiscountPrice)
                                                                    }}
                                                                </h6>
                                                            </div>
                                                        </div>

                                                        @endif
                                                        {{-- end if --}}







                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}





                                                        {{-- promo --}}
                                                        @if ($instance->promoCodeDiscountPrice)


                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Promo</p>
                                                                <h6>{{
                                                                    number_format($instance?->promoCodeDiscountPrice) }}
                                                                </h6>
                                                            </div>
                                                        </div>


                                                        @endif
                                                        {{-- end if --}}







                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}





                                                        {{-- startDate --}}
                                                        @if ($instance->startDate)

                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Start Date</p>
                                                                <h6>{{ date('d/m/y', strtotime($instance->startDate))}}
                                                                </h6>
                                                            </div>
                                                        </div>


                                                        @endif
                                                        {{-- end if --}}






                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}





                                                        {{-- bag --}}
                                                        @if ($instance->bag)


                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Cool Bag</p>
                                                                <h6>{{ number_format($bag?->price) }}</h6>
                                                            </div>
                                                        </div>


                                                        @endif
                                                        {{-- end if --}}





                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}



                                                        {{-- 1: free --}}
                                                        @if ($instance->deliveryPrice && $instance->deliveryPrice > 0)

                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Delivery</p>
                                                                <h6>{{ number_format($instance?->deliveryPrice) }}</h6>
                                                            </div>
                                                        </div>


                                                        @endif
                                                        {{-- end if --}}





                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}
                                                        {{-- ------------------------------------- --}}




                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>TAX</p>
                                                                <h6>{{ number_format($instance?->taxPrice ?? 0) }}</h6>
                                                            </div>
                                                        </div>






                                                        <div class="summary--section">
                                                            <div class="summary--line">
                                                                <p>Total Price</p>
                                                                <h6 class='fw-700'>{{
                                                                    number_format($instance?->totalCheckoutPrice ?? 0)
                                                                    }} AED
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- endWrap --}}



                                                </div>
                                            </div>
                                        </div>
                                        {{-- endSummary --}}






                                    </div>
                                    {{-- endCustomization --}}





                                    {{-- ------------------------------------------------------ --}}
                                    {{-- ------------------------------------------------------ --}}
                                    {{-- ------------------------------------------------------ --}}
                                    {{-- ------------------------------------------------------ --}}






                                    {{-- details --}}
                                    <div class="col-lg-3 col-md-12 d-none d-lg-block">



                                        {{-- bundleDetails --}}
                                        <div class="sidebar-car">
                                            <div class="item pb-0 mb-2">


                                                {{-- loop - types --}}
                                                @foreach ($pickedPlanBundle->typesInObjectForCheckout() ?? []
                                                as $typeName => $typeCount)

                                                <div class="features bundle-details">
                                                    <span><i class="ti-check"></i> {{
                                                        ucwords($typeName) }}</span>
                                                    <p>{{ $typeCount }}</p>
                                                </div>

                                                @endforeach
                                                {{-- end loop --}}




                                                {{-- ----------------------------- --}}
                                                {{-- ----------------------------- --}}




                                                {{-- buttons --}}
                                                <div class="btn-double mb-4 mt-3" data-grouptype="&amp;">

                                                    {{-- confirm --}}
                                                    <a href="#0">Consult</a>

                                                    {{-- customize --}}
                                                    <a href="javascript:void(0);" disabled>Customize</a>

                                                </div>
                                                {{-- endButtons --}}





                                            </div>
                                        </div>
                                        {{-- endBundleDetails --}}







                                        {{-- ------------------------------------------ --}}
                                        {{-- ------------------------------------------ --}}
                                        {{-- ------------------------------------------ --}}



                                        {{-- planDetails + promo --}}
                                        <div class="sidebar-car mt-4">




                                            {{-- promo --}}
                                            <div class="item pb-0 mb-2">


                                                {{-- promo --}}
                                                <input type="text" class="form-control input input-regular mb-4 text-center
                                                @if ($instance->promoCodeDiscountPrice > 0) active @endif"
                                                    wire:model='instance.promoCode'
                                                    wire:loading.class='no-events-processing'
                                                    wire:change.live='checkPromo()' placeholder="Discount Code">





                                                {{-- referral --}}
                                                @if ($versionPermission?->salesModuleHasReferrals)


                                                <input type="text"
                                                    class="form-control input input-regular mb-4 text-center"
                                                    wire:model='instance.referralCode'
                                                    wire:loading.class='no-events-processing'
                                                    placeholder="Referral Code" disabled>

                                                @endif
                                                {{-- end if --}}




                                                <div class="summary--hr "></div>

                                            </div>
                                            {{-- endPromo --}}




                                            {{-- -------------------------------- --}}
                                            {{-- -------------------------------- --}}
                                            {{-- -------------------------------- --}}
                                            {{-- -------------------------------- --}}





                                            {{-- plan-options --}}
                                            <div class="item pt-4">




                                                {{-- loop - types --}}
                                                <div class="summary--section mb-2">
                                                    <div class="summary--line text-center main">
                                                        <p>{{$pickedPlan?->name}}</p>
                                                        <p>{{ $pickedPlanBundle?->name}}</p>
                                                        <p class='text--secondary'>{{
                                                            $pickedPlanBundleRange?->range?->name}}</p>
                                                    </div>
                                                </div>





                                                {{-- loop - types --}}
                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Plan</p>
                                                        <h6>{{ $instance->totalPlanBundleRangePrice ?
                                                            number_format($instance?->totalPlanBundleRangePrice -
                                                            ($instance?->planBundleRangeAdjustmentPrice ?? 0)) : ''
                                                            }}
                                                        </h6>
                                                    </div>
                                                </div>



                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}




                                                {{-- discount --}}
                                                @if ($instance->planBundleRangeDiscountPrice)

                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Discount</p>
                                                        <h6>{{
                                                            number_format($instance?->planBundleRangeDiscountPrice)
                                                            }}
                                                        </h6>
                                                    </div>
                                                </div>

                                                @endif
                                                {{-- end if --}}







                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}





                                                {{-- promo --}}
                                                @if ($instance->promoCodeDiscountPrice)


                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Promo</p>
                                                        <h6>{{
                                                            number_format($instance?->promoCodeDiscountPrice) }}
                                                        </h6>
                                                    </div>
                                                </div>


                                                @endif
                                                {{-- end if --}}







                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}





                                                {{-- startDate --}}
                                                @if ($instance->startDate)

                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Start Date</p>
                                                        <h6>{{ date('d/m/y', strtotime($instance->startDate))}}</h6>
                                                    </div>
                                                </div>


                                                @endif
                                                {{-- end if --}}






                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}





                                                {{-- bag --}}
                                                @if ($instance->bag)


                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Cool Bag</p>
                                                        <h6>{{ number_format($bag?->price) }}</h6>
                                                    </div>
                                                </div>


                                                @endif
                                                {{-- end if --}}





                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}



                                                {{-- 1: free --}}
                                                @if ($instance->deliveryPrice && $instance->deliveryPrice > 0)

                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Delivery</p>
                                                        <h6>{{ number_format($instance?->deliveryPrice) }}</h6>
                                                    </div>
                                                </div>


                                                @endif
                                                {{-- end if --}}





                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}
                                                {{-- ------------------------------------- --}}




                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>TAX</p>
                                                        <h6>{{ number_format($instance?->taxPrice ?? 0) }}</h6>
                                                    </div>
                                                </div>






                                                <div class="summary--section">
                                                    <div class="summary--line">
                                                        <p>Total Price</p>
                                                        <h6 class='fw-700'>{{
                                                            number_format($instance?->totalCheckoutPrice ?? 0) }} AED
                                                        </h6>
                                                    </div>
                                                </div>


                                            </div>
                                            {{-- endWrap --}}





                                            {{-- -------------------------------- --}}
                                            {{-- -------------------------------- --}}
                                            {{-- -------------------------------- --}}
                                            {{-- -------------------------------- --}}




                                            {{-- price --}}
                                            <div class="title summary-per-day">
                                                <h4>AED {{ $this->instance->totalCheckoutPrice ?? 0 }} <span>/ total
                                                        price</span>
                                                </h4>
                                            </div>



                                        </div>



                                    </div>
                                    {{-- endDetails --}}






                                    {{-- ------------------------------------------------------ --}}
                                    {{-- ------------------------------------------------------ --}}
                                    {{-- ------------------------------------------------------ --}}
                                    {{-- ------------------------------------------------------ --}}




                                    {{-- terms --}}
                                    <div class="col-12">
                                        <div class="form-check checkbox-wrapper for-terms">
                                            <input class="form-check-input" type="checkbox" id="accept-terms--checkbox"
                                                wire:model='instance.acceptTerms' required>
                                            <label class="form-check-label" for="accept-terms--checkbox">
                                                <a href="javascript:void(0);" target='_blank'>Accept Terms
                                                    and Conditions</a>
                                            </label>
                                        </div>
                                    </div>





                                    {{-- --------------------------------------- --}}
                                    {{-- --------------------------------------- --}}




                                    {{-- submit --}}
                                    <div class="col-lg-8 col-md-12 pb-5">
                                        <div class="d-block text-center mb-5">
                                            <button class="booking-button submit-button mt-15">Continue</button>
                                        </div>
                                    </div>



                                </div>
                            </form>
                            {{-- endPlanBundleDetails --}}






                        </div>
                        {{-- endTab --}}


                        @endforeach
                        {{-- end loop - planCategories --}}






                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}
                        {{-- ------------------------------- --}}






                    </div>
                </div>
                {{-- endTabContent --}}





            </div>
            {{-- endRow --}}




        </div>
    </section>
    {{-- endPlans --}}












    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}





    {{-- buttonHandler --}}
    <script>
        $(document).on('click', ".btn--submit.for-mobile-summary", function(event) {

            $('.btn--submit.for-checkout').click();

        }); //end function
    </script>






    {{-- capture --}}
    <script>
        function setCaptchaToken(token) {
                @this.set('captchaToken', token);
            } // end function
    </script>




    {{-- select-handle --}}
    <script>
        $(".level--select").on("change", function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).select2('val');
            instance = $(this).attr('data-instance');

            levelType = $(this).attr('data-level');
            levelId = $(this).attr('data-id');

            @this.set(instance, selectValue);
            @this.levelSelect(levelType, null, selectValue, levelId);


            // 1.2: getID
            selectID = $(this).attr('id');
            // selectID == 'city--select' ? @this.calculateDeliveryPrice() : null;



        }); //end function
    </script>






    <script>
        $('.owl-carousel > label').on('click', function () {
            $('.owl-carousel').trigger('stop.owl.autoplay');

            $('.owl-carousel').each(function() {
            var carousel = $(this).data('owl.carousel');
            carousel.settings.autoplay = false; //don't know if both are necessary
            carousel.options.autoplay = false;
            $(this).trigger('refresh.owl.carousel');
            })

        });
    </script>







    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}




    {{-- section --}}
    @section('modals')

    <livewire:subscribe.customization.components.customization-excludes key='excludes--modal' />
    <livewire:subscribe.customization.components.customization-plan-details key='plan-details--modal' />
    <livewire:subscribe.customization.components.customization-login key='login--modal' />
    <livewire:subscribe.customization.components.customization-logout key='logout--modal' />


    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}




</div>
{{-- endWrapper --}}