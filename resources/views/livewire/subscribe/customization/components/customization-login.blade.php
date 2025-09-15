<div class="modal fade" id="login--modal" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            {{-- header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Account Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}


            {{-- body --}}
            <div class="modal-body">
                <div class="booking-box">
                    <form wire:submit='checkCustomer' class="booking-inner clearfix"
                        wire:loading.class='no-events-processing'>

                        {{-- row --}}
                        <div class="row">



                            {{-- email --}}
                            <div class="col-12 col-sm-12">
                                <label class='form--label d-block mb-1'>Email
                                    Address</label>
                                <input type="email" class="form-control input input-regular mb-4"
                                    wire:model='customerEmail' required>
                            </div>



                            {{-- password --}}
                            <div class="col-12 col-sm-12">
                                <label class='form--label d-block mb-1'>Password</label>
                                <input type="password" class="form-control input input-regular mb-4"
                                    wire:model='customerPassword' required>
                            </div>



                            <div class="col-12">
                                <p class='text-center' style="color: var(--bs-danger)">{{ $customerMessage ?? '' }}</p>
                            </div>


                        </div>
                        {{-- endRow --}}







                        {{-- ------------------------------------------ --}}
                        {{-- ------------------------------------------ --}}



                        {{-- submit --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="d-block text-center">
                                    <button class="booking-button submit-button text-uppercase">Login</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
            {{-- endModalBody --}}




        </div>
    </div>
</div>
{{-- endModal --}}