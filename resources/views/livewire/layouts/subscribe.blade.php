<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>YumY</title>


        {{-- favicon --}}
        <link rel="shortcut icon" href="img/favicon.png" />



        {{-- fonts --}}
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap" />

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







        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        {{ $slot }}




        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}






        @yield('modals')





        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}
        {{-- ----------------------------------------- --}}







        {{-- scripts --}}
        <script src="{{url('assets/js/bootstrap.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/modernizr.js')}}"></script>
        <script src="{{url('assets/js/images-loaded.js')}}"></script>
        <script src="{{url('assets/js/jquery-isotope.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/popper.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/scrollIt.js')}}"></script>
        <script src="{{url('assets/js/jquery-waypoints.js')}}"></script>
        <script src="{{url('assets/js/owl-carousel.js')}}"></script>
        <script src="{{url('assets/js/jquery-stellar.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/jquery-magnific-popup.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/select2.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/init-select.js')}}" data-navigate-once></script>
        <script src="{{url('assets/js/datepicker.js')}}"></script>
        <script src="{{url('assets/js/youTube-popup.js')}}"></script>
        <script src="{{url('assets/js/custom.js')}}"></script>







        {{-- sweetAlert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{--
        <x-livewire-alert::scripts /> --}}




    </body>
    {{-- endBody --}}






</html>
{{-- endHTML --}}