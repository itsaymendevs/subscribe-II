<div class="modal fade" id="plan-details--modal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Plan Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}


            {{-- body --}}
            <div class="modal-body">


                {{-- :: checkPlan --}}
                @if ($plan ?? null)

                <div class="booking-box">
                    <div class="booking-inner clearfix" wire:loading.class='no-events-processing'>

                        {{-- row --}}
                        <div class="row">
                            <div class="col-12 mb-4">



                                {{-- innerRow --}}
                                <div class="row">


                                    {{-- details --}}
                                    <div class="col-12">


                                        {{-- top --}}
                                        <div class="row align-items-end ">
                                            <div class="col-12 col-md-12 text-center">



                                                {{-- topGallery --}}
                                                <div
                                                    class="d-flex flex-wrap justify-content-center plan-details--gallery">


                                                    {{-- :: check --}}
                                                    @if ($plan?->imageFile)

                                                    <img class='border-0 mb-0 pb-2 w-100'
                                                        src="{{ $storagePath . 'menu/plans/' . $plan->imageFile }}">

                                                    @endif
                                                    {{-- end if --}}



                                                </div>
                                                {{-- endTopGallery --}}






                                                {{-- ---------------------------------- --}}
                                                {{-- ---------------------------------- --}}
                                                {{-- ---------------------------------- --}}




                                                {{-- name - price --}}
                                                <h2 class='mb-3 mb-md-3'>{{ $plan?->name }}</h2>


                                                {{-- price --}}
                                                <div class="plan-details--tags">
                                                    <span>{{ $plan?->category?->name }}</span>
                                                    <span>Starting Price {{ $plan?->startingPrice }} AED</span>
                                                </div>



                                                {{-- tags --}}
                                                <div class="plan-details--tags filled mb-3">

                                                    {{-- loop - tags --}}
                                                    @foreach ($plan?->tagsInArray() ?? [] as $planTag)

                                                    <span>{{ $planTag }}</span>

                                                    @endforeach
                                                    {{-- end loop --}}

                                                </div>
                                                {{-- endTags --}}

                                            </div>
                                        </div>
                                        {{-- endTop --}}






                                        {{-- brief --}}
                                        {{-- <p class='plan-details--desc mb-4 text-center'>{{ $plan?->desc }}</p> --}}


                                        {{-- description --}}
                                        <p class='plan-details--desc text-center mb-4'>{!! $plan?->longDesc !!}</p>

                                    </div>
                                    {{-- endColumn --}}



                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}


                                    {{-- images --}}
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap plan-details--gallery">




                                            {{-- :: check --}}
                                            @if ($plan?->secondImageFile)

                                            <img src="{{ $storagePath . 'menu/plans/' . $plan->secondImageFile }}">

                                            @endif
                                            {{-- end if --}}




                                            {{-- :: check --}}
                                            @if ($plan?->extraImageFile)

                                            <img src="{{ $storagePath . 'menu/plans/' . $plan->extraImageFile }}">

                                            @endif
                                            {{-- end if --}}



                                            {{-- :: check --}}
                                            @if ($plan?->secondExtraImageFile)

                                            <img src="{{ $storagePath . 'menu/plans/' . $plan->secondExtraImageFile }}">

                                            @endif
                                            {{-- end if --}}




                                            {{-- :: check --}}
                                            @if ($plan?->thirdExtraImageFile)

                                            <img src="{{ $storagePath . 'menu/plans/' . $plan->thirdExtraImageFile }}">

                                            @endif
                                            {{-- end if --}}




                                        </div>
                                    </div>







                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}





                                    {{-- menu-dates --}}
                                    <div class="col-12">
                                        <div
                                            class="sample-menu--slider justify-content-start justify-content-lg-center">


                                            {{-- loop - upcomingSchedules --}}
                                            @foreach ($upcomingDates ?? [] as $key => $upcomingDate)

                                            <a href="javascript:void(0);"
                                                class='@if ($upcomingDate == $searchDate) active no-events @endif'
                                                wire:click="changeDate('{{ $upcomingDate }}')"
                                                wire:loading.class='no-events-processing'>
                                                <span>{{ date('D', strtotime($upcomingDate)) }}</span>
                                                <span>
                                                    {{ date('d/m', strtotime($upcomingDate)) }}
                                                </span>
                                            </a>

                                            @endforeach
                                            {{-- end loop --}}

                                        </div>
                                    </div>
                                    {{-- endMenu --}}






                                    {{-- ------------------------------------------- --}}
                                    {{-- ------------------------------------------- --}}




                                    {{-- filters --}}
                                    <div class="col-12">
                                        <div class="row justify-content-center">


                                            {{-- city --}}
                                            <div class="col-12 col-sm-4 mb-3" wire:ignore>
                                                <div wire:loading.class='no-events-processing'>

                                                    <select id='meal-type--select' class="select form-select"
                                                        wire.model='searchMealType' placeholder='Select Type'
                                                        wire:change='getScheduleMeals' required>

                                                        @foreach ($mealTypes ?? [] as $mealType)

                                                        <option value="{{ $mealType->id }}">{{ $mealType->name }}
                                                        </option>

                                                        @endforeach
                                                        {{-- end loop --}}

                                                    </select>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    {{-- endFilters --}}




                                    {{-- ------------------------------------------- --}}
                                    {{-- ------------------------------------------- --}}




                                    {{-- menu-samples --}}
                                    <div class="col-12" wire:loading.class='no-events-processing'>
                                        <div class="row">


                                            {{-- loop - meals --}}
                                            @foreach ($meals?->take(6) ?? [] as $meal)


                                            <div class="col-6 col-md-4 col-lg-3"
                                                key='single-schedule-meal-popup-{{ $meal->id }}'>
                                                <div class="sample-menu--card">

                                                    {{-- imageFile --}}
                                                    <img src='{{ $storagePath . "menu/meals/" . $meal?->imageFile }}'>


                                                    {{-- name --}}
                                                    <h6 class='truncate-2'>{{ $meal?->name }}</h6>
                                                </div>
                                            </div>

                                            @endforeach
                                            {{-- end loop --}}


                                        </div>
                                    </div>







                                </div>
                                {{-- endInnerRow --}}


                            </div>
                        </div>
                        {{-- endRow --}}







                        {{-- ------------------------------------------ --}}
                        {{-- ------------------------------------------ --}}



                        {{-- submit --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="d-block text-center">
                                    <button type="button" data-bs-dismiss='modal'
                                        class="booking-button submit-button text-uppercase">Return</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                @endif
                {{-- end if --}}


            </div>
            {{-- endModalBody --}}




        </div>
    </div>
</div>
{{-- endModal --}}