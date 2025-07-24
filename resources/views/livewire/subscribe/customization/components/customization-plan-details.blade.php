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


                                        {{-- top --}}
                                        <div class="row align-items-end mb-3">
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
                                                <h2 class='text-light mb-3 mb-md-3'>{{ $plan?->name }}</h2>


                                                {{-- price --}}
                                                <div class="plan-details--tags">
                                                    <span>{{ $plan?->category?->name }}</span>
                                                    <span>Start Price {{ $plan?->startingPrice }} AED</span>
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
                                        <p class='plan-details--desc mb-4 text-center'>{{ $plan?->desc }}</p>


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