<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


        @yield('head')



        {{-- favicon --}}
        <link rel="icon" type="image/png" href='{{ url("{$storagePath}profile/{$globalProfile->fourthFavFile}") }}'
            sizes="96x96" />

        <link rel="icon" type="image/svg+xml"
            href='{{ url("{$storagePath}profile/{$globalProfile->thirdFavFile}") }}' />

        <link rel="shortcut icon" href='{{ url("{$storagePath}profile/{$globalProfile->favFile}") }}' />

        <link rel="apple-touch-icon" sizes="180x180"
            href='{{ url("{$storagePath}profile/{$globalProfile->secondFavFile}") }}' />

        <meta name="apple-mobile-web-app-title" content="Meal Plans" />

        <link rel="manifest" href='{{ url("{$storagePath}profile/{$globalProfile->manifestFile}") }}' />








        {{-- fonts --}}
        @if ($globalProfile?->fontLinks)

        {!! $globalProfile?->fontLinks !!}

        @else

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap" />

        @endif
        {{-- end if --}}




        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


        {{-- css --}}
        <link rel="stylesheet" href="{{url('assets/css/vars.css')}}" />
        <link rel="stylesheet" href="{{url('assets/css/plugins.css')}}" />
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{url('assets/css/override.css')}}" />

        <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}" />
        <link rel="stylesheet" href="{{ url('assets/css/receipt.css') }}" />
        <link rel="stylesheet" href="{{ url('assets/css/custom-select.css') }}" />



        {{-- jquery --}}
        <script src="{{url('assets/js/jquery.js')}}"></script>



        @yield('styles')

    </head>
    {{-- endHeader --}}







    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}






    {{-- body --}}
    <body>



        {{-- preloader --}}
        <div class="preloader-bg"></div>
        <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader"><span></span></div>
            </div>
        </div>






        {{-- progressBar --}}
        <div class="progress-wrap cursor-pointer">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>









        {{-- navbar --}}
        <livewire:subscribe.components.navbar key='navbar' />






        {{-- floating-whatsapp --}}
        <div class="floating--whatsapp" wire:ignore>
            <a href="https://wa.me/{{ $globalProfile?->whatsapp }}?text=Hi%2C%20I%20need%20help%20choosing%20a%20meal%20plan."
                target="_blank">
                <img src="{{ url('assets/img/whatsapp.png') }}" alt="">
            </a>
        </div>




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{ $slot }}






        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        @yield('modals')




        <footer class="footer clearfix
            @if (Request::is('', '/', '*/customization', 'customization', '/customization')) with-space @endif">
            <div class="container">
                <div class="bottom-footer-text">
                    <div class="row copyright">
                        <div class="col-12 text-center">
                            <p class="mb-0">Powered by
                                <a href="https://doer.ae" target="_blank"
                                    style="background-image: none; background: none;">
                                    @if ($customization?->colorLayoutText == 'Light')
                                    <img src="{{ url('assets/img/doer.png') }}" alt="" class='powered-by--logo'>
                                    @else
                                    <img src="{{ url('assets/img/doer-dark.png') }}" alt="" class='powered-by--logo'>
                                    @endif
                                    {{-- end if --}}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- scripts --}}
        <script src="{{url('assets/js/bootstrap.js')}}"></script>
        <script src="{{url('assets/js/modernizr.js')}}"></script>
        <script src="{{url('assets/js/images-loaded.js')}}"></script>
        <script src="{{url('assets/js/jquery-isotope.js')}}"></script>
        <script src="{{url('assets/js/popper.js')}}"></script>
        <script src="{{url('assets/js/scrollIt.js')}}"></script>
        <script src="{{url('assets/js/jquery-waypoints.js')}}"></script>
        <script src="{{url('assets/js/owl-carousel.js')}}"></script>
        <script src="{{url('assets/js/jquery-stellar.js')}}"></script>
        <script src="{{url('assets/js/jquery-magnific-popup.js')}}"></script>
        <script src="{{url('assets/js/select2.js')}}"></script>
        <script src="{{url('assets/js/init-select.js')}}"></script>
        <script src="{{url('assets/js/datepicker.js')}}"></script>
        <script src="{{url('assets/js/youTube-popup.js')}}"></script>
        <script src="{{url('assets/js/html2canvas.js')}}"></script>
        <script src="{{url('assets/js/custom.js')}}"></script>







        {{-- sweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{--
        <x-livewire-alert::scripts /> --}}




        @yield('scripts')


    </body>
    {{-- endBody --}}






</html>
{{-- endHTML --}}