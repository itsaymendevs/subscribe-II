<div class="modal fade" id="plan-menu--modal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Plan Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}


            {{-- body --}}
            <div class="modal-body position-relative">





                {{-- loader --}}
                <div class="section--loader-wrapper" wire:loading.class='d-flex'
                    wire:target='planMenu, getScheduleMeals, changeDate'>
                    <span class="section--loader"></span>
                </div>






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




                                                {{-- name --}}
                                                <h2 class='mb-3 mb-md-3 plan-details--title'>{{ $plan?->name }}</h2>


                                            </div>
                                        </div>
                                        {{-- endTop --}}




                                    </div>
                                    {{-- endColumn --}}





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

                                                    <select id='meal-type--select'
                                                        class="select form-select plan-menu--select"
                                                        data-instance='searchMealType' placeholder='Select Type'
                                                        required>

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








    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}
    {{-- -------------------------------------------------------- --}}




    {{-- select-handle --}}
    <script>
        $(document).on('change', ".plan-menu--select", function(event) {


            // 1.1: getValue - instance
            selectValue = $(this).val();
            instance = $(this).attr('data-instance');


            @this.set(instance, selectValue);
            @this.getScheduleMeals();


        }); //end function
    </script>





</div>
{{-- endModal --}}
