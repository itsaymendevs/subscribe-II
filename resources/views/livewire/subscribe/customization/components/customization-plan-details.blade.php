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
                <div class="booking-box">
                    <div class="booking-inner clearfix" wire:loading.class='no-events-processing'>

                        {{-- row --}}
                        <div class="row">
                            <div class="col-12 mb-4">



                                {{-- innerRow --}}
                                <div class="row">


                                    {{-- details --}}
                                    <div class="col-12">
                                        <div class="row align-items-end mb-3">

                                            {{-- title --}}
                                            <div class="col-12 col-md-12 text-center">
                                                <h2 class='text-light mb-3 mb-md-3'>{{ $plan?->name }}</h2>
                                                <div class="plan-details--tags">
                                                    <span>Start Price {{ $plan?->startingPrice }} AED</span>
                                                </div>
                                            </div>


                                        </div>

                                        {{-- description --}}
                                        <p class='plan-details--desc text-center'>{{ $plan?->longDesc }}</p>
                                    </div>




                                    {{-- -------------------------------- --}}
                                    {{-- -------------------------------- --}}


                                    {{-- images --}}
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap plan-details--gallery">


                                            {{-- :: check --}}
                                            @if ($plan?->imageFile)

                                            <img src="{{ $storagePath . 'menu/plans/' . $plan->imageFile }}">

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
            </div>
            {{-- endModalBody --}}




        </div>
    </div>
</div>
{{-- endModal --}}