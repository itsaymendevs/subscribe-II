<div class="modal fade" id="bmi--modal" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            {{-- header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">BMI Calculator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}


            {{-- body --}}
            <div class="modal-body">
                <div class="booking-box for-bmi">
                    <form wire:submit='calculate' class="booking-inner clearfix"
                        wire:loading.class='no-events-processing'>

                        {{-- row --}}



                        {{-- results --}}
                        <div class="row  @if (!$showResult) d-none @endif">


                            {{-- height --}}
                            <div class="col-12 px-1">
                                <div class="bmi--card">

                                    {{-- label --}}
                                    <label class='form--label for-bmi for-result d-block mb-1'>{{ $bmi ?? 0 }}</label>
                                    <label class='form--label for-bmi-status d-block mb-1'>Your BMI Category is
                                        <strong>{{ $bmiStatus ?? 0 }}</strong></label>


                                </div>
                            </div>




                            {{-- calculate --}}
                            <div class="col-12 px-0">
                                <div class="d-block text-center">
                                    <button type='button' class="booking-button submit-button for-bmi text-uppercase"
                                        wire:loading.class='no-events-loading' wire:click='calculateAgain'>Calculate
                                        Again</button>
                                </div>
                            </div>



                        </div>
                        {{-- endRow --}}





                        {{-- ---------------------------------------------- --}}
                        {{-- ---------------------------------------------- --}}
                        {{-- ---------------------------------------------- --}}
                        {{-- ---------------------------------------------- --}}


                        {{-- information-row --}}
                        <div class="row @if ($showResult) d-none @endif">



                            {{-- height --}}
                            <div class="col-6 col-sm-6 px-1">
                                <div class="bmi--card">

                                    {{-- label --}}
                                    <label class='form--label for-bmi d-block mb-1'>Height
                                        <span>CM</span>
                                    </label>

                                    <div class="bmi--section">

                                        {{-- plus --}}
                                        <a href="javascript:void(0)" wire:click="minus('height')">
                                            <i class='bi bi-dash-lg'></i>
                                        </a>


                                        <input type='text' class="form-control input input-regular mb-0 for-bmi"
                                            wire:model='height' wire:loading.class='no-events'>


                                        {{-- minus --}}
                                        <a href="javascript:void(0)" wire:click="plus('height')">
                                            <i class='bi bi-plus-lg'></i>
                                        </a>

                                    </div>
                                </div>
                            </div>






                            {{-- ------------------------------------------ --}}
                            {{-- ------------------------------------------ --}}



                            {{-- weight --}}
                            <div class="col-6 px-1">
                                <div class="bmi--card">

                                    {{-- label --}}
                                    <label class='form--label for-bmi d-block mb-1'>Weight
                                        <span>KG</span>
                                    </label>

                                    <div class="bmi--section">

                                        {{-- plus --}}
                                        <a href="javascript:void(0)" wire:click="minus('weight')">
                                            <i class='bi bi-dash-lg'></i>
                                        </a>

                                        <input type='text' class="form-control input input-regular mb-0 for-bmi"
                                            wire:model='weight' wire:loading.class='no-events'>

                                        {{-- minus --}}
                                        <a href="javascript:void(0)" wire:click="plus('weight')">
                                            <i class='bi bi-plus-lg'></i>
                                        </a>

                                    </div>
                                </div>
                            </div>







                            {{-- ------------------------------------------ --}}
                            {{-- ------------------------------------------ --}}



                            {{-- age --}}
                            <div class="col-12 col-sm-12 px-1">
                                <div class="bmi--card">

                                    {{-- label --}}
                                    <label class='form--label for-bmi d-block mb-1'>Age
                                        <span>Years</span>
                                    </label>


                                    <div class="bmi--section">

                                        {{-- plus --}}
                                        <a href="javascript:void(0)" wire:click="minus('age')">
                                            <i class='bi bi-dash-lg'></i>
                                        </a>


                                        <input type='text' class="form-control input input-regular mb-0 for-bmi"
                                            wire:model='age' wire:loading.class='no-events'>


                                        {{-- minus --}}
                                        <a href="javascript:void(0)" wire:click="plus('age')">
                                            <i class='bi bi-plus-lg'></i>
                                        </a>

                                    </div>
                                </div>
                            </div>





                            {{-- ------------------------------------------ --}}
                            {{-- ------------------------------------------ --}}




                            {{-- gender - male --}}
                            <div class="col-6 col-sm-6 px-1">
                                <a href='javascript:void(0);' wire:click="changeGender('Male')"
                                    class="bmi--card for-gender @if ($gender == 'Male') active no-events @endif">
                                    <label class='form--label for-bmi d-block mb-1'>Male</label>
                                </a>
                            </div>




                            {{-- gender - female --}}
                            <div class="col-6 col-sm-6 px-1">
                                <a href='javascript:void(0);' wire:click="changeGender('Female')"
                                    class="bmi--card for-gender @if ($gender == 'Female') active no-events @endif">
                                    <label class='form--label for-bmi d-block mb-1'>Female</label>
                                </a>
                            </div>




                            {{-- ----------------------------------------------- --}}
                            {{-- ----------------------------------------------- --}}



                            {{-- calculate --}}
                            <div class="col-12 px-0">
                                <div class="d-block text-center">
                                    <button class="booking-button submit-button for-bmi text-uppercase"
                                        wire:loading.class='no-events-loading'
                                        wire:target='calculate'>Calculate</button>
                                </div>
                            </div>





                        </div>
                        {{-- endRow --}}


                    </form>
                </div>
            </div>
            {{-- endModalBody --}}




        </div>
    </div>
</div>
{{-- endModal --}}