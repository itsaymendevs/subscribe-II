<div class="modal fade" id="excludes--modal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Allergens — Dislikes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}


            {{-- body --}}
            <div class="modal-body">
                <div class="booking-box">
                    <div class="booking-inner clearfix" wire:loading.class='no-events-processing'>

                        {{-- row --}}
                        <div class="row @if ($allergyLists?->count() == 0) d-none @endif">
                            <div class="col-12 mb-4">
                                <label class='form--label d-block mb-1 d-flex align-items-center'>Select Your
                                    Allergens<i class='ti ti-info-alt label--icon'></i></label>


                                {{-- innerRow --}}
                                <div class="row allergen-wrapper" wire:ignore>


                                    {{-- loop - allergies --}}
                                    @foreach ($allergyLists ?? [] as $key =>
                                    $allergyList)



                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-check checkbox-wrapper for-allergen">
                                            <input class="form-check-input" type="checkbox"
                                                id="allergen-checkbox-{{ $allergyList->id }}"
                                                value='{{ $allergyList->id }}' wire:model='instance.allergyLists'>
                                            <label class="form-check-label"
                                                for="allergen-checkbox-{{ $allergyList->id }}">{{$allergyList->name}}</label>
                                        </div>
                                    </div>


                                    @endforeach
                                    {{-- end loop - allergies --}}






                                </div>
                                {{-- endInnerRow --}}


                            </div>
                        </div>
                        {{-- endRow --}}






                        {{-- ------------------------------------ --}}
                        {{-- ------------------------------------ --}}








                        {{-- row --}}
                        <div class="row @if ($excludeLists?->count() == 0) d-none @endif">
                            <div class="col-12 mb-4">
                                <label class='form--label d-block mb-1 d-flex align-items-center'>Select Your Dislikes<i
                                        class='ti ti-info-alt label--icon'></i>
                                </label>


                                {{-- innerRow --}}
                                <div class="row allergen-wrapper">

                                    {{-- loop - excludes --}}
                                    @foreach ($excludeLists ?? [] as $key => $excludeList)


                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div class="form-check checkbox-wrapper for-allergen">
                                            <input class="form-check-input" type="checkbox"
                                                id="dislikes-checkbox-{{ $excludeList->id }}"
                                                value='{{ $excludeList->id }}' wire:model='instance.excludeLists'>
                                            <label class="form-check-label"
                                                for="dislikes-checkbox-{{ $excludeList->id }}">{{$excludeList->name}}</label>
                                        </div>
                                    </div>

                                    @endforeach
                                    {{-- end loop --}}



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
                                        class="booking-button submit-button text-uppercase"
                                        wire:click='confirm'>Confirm</button>
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