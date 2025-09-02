<div class="modal fade" id="logout--modal" wire:ignore.self>
    <div class="modal-dialog  modal-sm modal-dialog-centered">
        <div class="modal-content">



            {{-- header --}}
            <div class="modal-header py-3">
                <h5 class="modal-title text-center w-100 d-block" id="exampleModalLabel">Account</h5></button>
            </div>


            {{-- ------------------------------------- --}}
            {{-- ------------------------------------- --}}





            {{-- body --}}
            <div class="modal-body">
                <div class="booking-box">
                    <div class="booking-inner clearfix" wire:loading.class='no-events-processing'>

                        <div class="row">
                            <div class="col-12">



                                {{-- cancel --}}
                                <div class="d-block text-center">
                                    <button type='button' class="booking-button submit-button text-uppercase"
                                        data-bs-dismiss='modal'>Cancel</button>
                                </div>



                                {{-- logout --}}
                                <div class="d-block text-center">
                                    <button type='button'
                                        class="booking-button for-cancel submit-button text-uppercase mt-3"
                                        wire:click='logout'>Logout</button>
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