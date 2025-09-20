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
            <div class="modal-body position-relative">



                {{-- loader --}}
                <div class="section--loader-wrapper" wire:loading.class='d-flex' wire:target='remount, confirm'>
                    <span class="section--loader"></span>
                </div>





                {{-- ------------------------------------------- --}}
                {{-- ------------------------------------------- --}}




                <div class="booking-box">
                    <div class="booking-inner clearfix" wire:loading.class='no-events-processing'>

                        {{-- row --}}
                        <div class="row @if ($allergyLists?->count() == 0) d-none @endif">
                            <div class="col-12 mb-4">
                                <label class='form--label d-block mb-1 d-flex align-items-center' wire:ignore>Select
                                    Your
                                    Allergens<i class='ti ti-info-alt label--icon' data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Select anything that may cause allergic reactions"></i></label>




                                {{-- innerRow --}}
                                <div class="row allergen-wrapper">


                                    {{-- loop - allergies --}}
                                    @foreach ($allergyLists ?? [] as $key =>
                                    $allergyList)

                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div
                                            class="form-check checkbox-wrapper for-allergen
                                        @if (count($instance?->allergyLists) >= 4 && !in_array($allergyList?->id, $instance->allergyLists)) no-events-loading @endif">
                                            <input class="form-check-input" type="checkbox"
                                                id="allergen-checkbox-{{ $allergyList->id }}"
                                                value='{{ $allergyList->id }}' wire:model='instance.allergyLists'
                                                wire:change='checkAllergies'>
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
                                <label class='form--label d-block mb-1 d-flex align-items-center' wire:ignore>Select
                                    Your Dislikes<i class='ti ti-info-alt label--icon' data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Select what you prefer to avoid for taste or personal reasons"></i>
                                </label>


                                {{-- innerRow --}}
                                <div class="row allergen-wrapper">

                                    {{-- loop - excludes --}}
                                    @foreach ($excludeLists ?? [] as $key => $excludeList)


                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                        <div
                                            class="form-check checkbox-wrapper for-allergen
                                        @if (count($instance?->excludeLists) >= 4 && !in_array($excludeList?->id, $instance->excludeLists)) no-events-loading @endif">
                                            <input class="form-check-input" type="checkbox"
                                                id="dislikes-checkbox-{{ $excludeList->id }}"
                                                value='{{ $excludeList->id }}' wire:model='instance.excludeLists'
                                                wire:change='checkExcludes'>
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
                                    <button type="button" class="booking-button submit-button text-uppercase"
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
