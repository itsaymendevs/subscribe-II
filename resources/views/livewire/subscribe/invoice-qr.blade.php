<div>




    {{-- head --}}
    @section('head')

    <title>Invoice</title>

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



                {{-- content --}}
                <div class="col-12 text-center">


                    {{-- wrapper --}}
                    <div id='invoice--main' class="receipt--wrapper">

                        {{-- logo - trn --}}
                        <div class="logo">
                            <img src="{{ url($storagePath . 'profile/' . $globalProfile?->imageFile) }}">


                            {{-- title --}}
                            <h1 class="trn-title mt-2">
                                <span>TAX Invoice</span>
                            </h1>



                            {{-- TRN --}}
                            <h1 class="trn mt-1">
                                <span>TRN</span>
                                <i class='bi bi-hash'></i><span>{{ $globalProfile?->TRN }}</span>
                            </h1>
                        </div>



                        {{-- hr --}}
                        <div class="receipt--hr"></div>



                        {{-- ------------------------------------------ --}}
                        {{-- ------------------------------------------ --}}






                        {{-- row --}}
                        <div class="row receipt--row">

                            {{-- location --}}
                            <div class="col-12">
                                <div class="location text-center">
                                    <span>{{ $globalProfile?->name }}</span>
                                    <i class='bi bi-dash-lg'></i>
                                    <span>{{ $globalProfile?->city?->name }}</span>
                                </div>
                            </div>


                            {{-- phone --}}
                            <div class="col-12 mb-1">
                                <div class="location text-center">
                                    <span>Tel</span>
                                    <span class="ms-1">{{ $globalProfile?->phone }}</span>
                                </div>
                            </div>

                        </div>
                        {{-- endRow --}}






                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- row --}}
                        <div class="row receipt--row">

                            {{-- reference --}}
                            <div class="col-8">
                                <div class="location">
                                    <span>Order #</span><span class="fw-700 ms-1">{{
                                        $subscription?->paymentReference
                                        }}</span>
                                </div>
                            </div>



                            {{-- type --}}
                            <div class="col-4">
                                <div class="text-end location"><span>Meal Plan</span>
                                </div>
                            </div>

                        </div>
                        {{-- endRow --}}







                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- cashier - before --}}



                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- orderTime --}}
                        <div class="row receipt--row">

                            {{-- title --}}
                            <div class="col-5">
                                <div class="location"><span>Order Time</span></div>
                            </div>



                            {{-- dateTime --}}
                            <div class="col-7">
                                <div class="text-end location">
                                    <span>{{ date('d / m / Y — H:i',strtotime( $subscription->created_at)) }}</span>
                                </div>
                            </div>

                        </div>
                        {{-- endRow --}}



                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- hr --}}
                        <div class="receipt--hr"></div>



                        {{-- items --}}




                        {{-- 1: plan --}}
                        <div class="row receipt--row for-item">

                            {{-- quantity --}}
                            <div class="col-1">
                                <div class="item"><small class="quantity">1</small>
                                </div>
                            </div>


                            {{-- plan --}}
                            <div class="col-8">
                                <div class="item"><span>{{ $subscription?->plan?->name }}</span></div>
                            </div>


                            {{-- planPrice --}}
                            <div class="col-3">
                                <div class="text-end item">
                                    <span class="price">
                                        {{ number_format($subscription?->planPrice, 2) }}
                                    </span>
                                </div>
                            </div>




                            {{-- plan-details --}}
                            <div class="col-11 offset-1">
                                <div class="item sub">
                                    <span>{{ $subscription?->bundle?->name }} — {{ $subscription?->planDays }}
                                        days<br>{{ implode(' / ',
                                        $subscription?->bundle?->typesInObject()) }}
                                    </span>
                                </div>
                            </div>



                            {{-- -------------------------------------- --}}
                            {{-- -------------------------------------- --}}




                            {{-- -planDiscount --}}
                            @if ($subscription?->planDiscountPrice)

                            <div class="col-11 offset-1">
                                <div class="item sub">
                                    <span>Discount. {{ number_format($subscription?->planDiscountPrice ?? 0, 2) }}
                                    </span>
                                </div>
                            </div>


                            @endif
                            {{-- end if --}}



                        </div>
                        {{-- endRow --}}





                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- hr --}}
                        <div class="receipt--hr"></div>




                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- subtotal --}}
                        <div class="row receipt--row">


                            {{-- title --}}
                            <div class="col-7">
                                <div class="item"><span>Subtotal</span></div>
                            </div>


                            <div class="col-5">
                                <div class="text-end item"><span class="price">{{
                                        number_format($subscription?->planPrice - ($subscription?->planDiscountPrice
                                        ?? 0), 2) }}</span></div>
                            </div>
                        </div>
                        {{-- endRow --}}



                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}






                        {{-- promo --}}
                        @if ($subscription?->promoCodeId)

                        <div class="row receipt--row">


                            {{-- title --}}
                            <div class="col-7">
                                <div class="item"><span>Promo</span></div>
                            </div>


                            <div class="col-5">
                                <div class="text-end item"><span class="price">-
                                        {{number_format($subscription?->promoCodeDiscountPrice,1)}}</span>
                                </div>
                            </div>
                        </div>

                        @endif
                        {{-- endRow --}}







                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}






                        {{-- checkBag --}}
                        @if ($subscription?->bagPrice && $subscription?->bagPrice > 0)


                        <div class="row receipt--row">


                            {{-- title --}}
                            <div class="col-7">
                                <div class="item"><span>Cool Bag</span></div>
                            </div>


                            <div class="col-5">
                                <div class="text-end item"><span class="price">{{
                                        number_format($subscription?->bagPrice, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        @endif
                        {{-- end if --}}







                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- delivery --}}
                        @if (!is_null($subscription?->deliveryPrice))


                        {{-- row --}}
                        <div class="row receipt--row">
                            <div class="col-7">
                                <div class="item"><span>Delivery</span></div>
                            </div>
                            <div class="col-5">
                                <div class="text-end item">
                                    <span class="price">
                                        {{-- 3.1: free --}}
                                        @if ($subscription?->deliveryPrice == 0)

                                        {{ "FREE" }}

                                        @else
                                        {{ number_format($subscription?->deliveryPrice, 2) }}

                                        @endif
                                        {{-- end if --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- endRow --}}


                        @endif
                        {{-- end if --}}











                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}





                        {{-- TAX --}}
                        <div class="row receipt--row">
                            <div class="col-7">
                                <div class="item"><span>TAX</span></div>
                            </div>
                            <div class="col-5">
                                <div class="text-end item"><span class="price">{{
                                        number_format($subscription?->taxPrice, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- endRow --}}







                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- wallet --}}
                        @if ($subscription?->walletDiscountPrice)

                        <div class="row receipt--row">
                            <div class="col-7">
                                <div class="item"><span>Wallet Discount</span></div>
                            </div>
                            <div class="col-5">
                                <div class="text-end item"><span class="price">{{
                                        number_format($subscription?->walletDiscountPrice, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        @endif
                        {{-- endRow --}}





                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}




                        {{-- totalPrice --}}
                        <div class="row receipt--row">
                            <div class="col-7">
                                <div class="item"><span>Total Price</span></div>
                            </div>
                            <div class="col-5">
                                <div class="text-end item"><span class="fw-700 with-currency">{{
                                        number_format($subscription?->totalCheckoutPrice, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        {{-- endRow --}}





                        {{-- ------------------------------------- --}}
                        {{-- ------------------------------------- --}}






                        {{-- qr --}}
                        <div class="row receipt--row">

                            {{-- qr --}}
                            <div class="col-12 mt-3">
                                <a class="receipt--qr sm"
                                    href="{{ route('subscribe.getInvoiceQR', [$subscription?->id]) }}" target='_blank'>
                                    {!! QrCode::size(180)
                                    ->backgroundColor(255,255,255, 0)
                                    ->generate("{{ route('subscribe.getInvoiceQR', [$subscription?->id]) }}") !!}
                                </a>

                                {{-- caption --}}
                                <p class="receipt--qr-caption">{{ "SUB-{$subscription?->paymentReference}" }}</p>
                            </div>


                        </div>
                        {{-- endRow --}}



                    </div>



                </div>
                {{-- endColumn --}}







                {{-- ---------------------------------- --}}
                {{-- ---------------------------------- --}}




                {{-- downloadButton --}}
                <div class="col-12 text-center mt-4">
                    <a href="javascript:void(0);" class="btn btn--submit invoice--download-btn download--btn"
                        data-download='#invoice--main'>Download
                    </a>

                    <a href="{{ $globalProfile?->applicationURL }}" target='_blank'
                        class="btn btn--submit for-login invoice--download-btn download--btn">Login
                    </a>

                </div>





            </div>
        </div>
    </section>
    {{-- endPlans --}}











    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}
    {{-- -------------------------------------------------- --}}




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