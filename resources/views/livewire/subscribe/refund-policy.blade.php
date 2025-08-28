<div>




    {{-- head --}}
    @section('head')

    <title>Refund Policy</title>

    @endsection
    {{-- endHead --}}





    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}




    {{-- colors --}}
    <livewire:subscribe.components.colors key='colors' />




    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}
    {{-- ----------------------------------------------------------------- --}}





    {{-- wrapper --}}
    <section class="blog2 section-padding" style="min-height: 91vh">
        <div class="container">
            <div class="row">





                {{-- pageTitle --}}
                <div class="col-12">
                    <div class="section-title text-center mb-4">Refund Policy</div>
                </div>



                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}





                {{-- privacy --}}
                <div class="col-12">
                    <div class="terms--wrapper privacy--wrapper">

                        {{-- refundPolicy --}}
                        @if ($websiteSettings?->refundPolicy)

                        {!! $websiteSettings?->refundPolicy !!}

                        @endif
                        {{-- end if --}}

                    </div>
                </div>




                {{-- -------------------------------------- --}}
                {{-- -------------------------------------- --}}





            </div>
            {{-- endRow --}}




        </div>
    </section>
    {{-- endPlans --}}










    {{-- section --}}
    @section('modals')


    {{-- bmi --}}
    <livewire:subscribe.customization.components.customization-bmi key='bmi-calculator--modal' />


    @endsection
    {{-- endSection --}}




    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}



</div>
{{-- endWrapper --}}