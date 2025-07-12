<nav class="navbar navbar-expand-lg">
    <div class="container">


        {{-- logo --}}
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('subscribe.customization') }}">
                <img src='{{ url("{$storagePath}/profile/{$globalProfile->imageFile}") }}' class="logo-img" alt="" />
            </a>
        </div>



        {{-- -------------------------------------------- --}}
        {{-- -------------------------------------------- --}}



        {{-- collapse-button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
        </button>



        {{-- collapse --}}
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">


                {{-- 1: home --}}
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#0" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">Home</a>
                </li>


                {{-- 2: plans --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#0" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">Meal Plans</a>
                </li>


                {{-- 3: contact --}}
                <li class="nav-item"><a class="nav-link" href="#0">Contact</a></li>




                {{-- 4: login --}}
                @if (!session('hide-login'))

                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle='modal'
                        data-bs-target='#login--modal'>Login</a></li>



                {{-- showAccount --}}
                @else

                <li class="nav-item" style="border: 1px solid white; border-radius: 8px;">
                    <a class="nav-link text-center" href="javascript:void(0);" data-bs-toggle='modal'
                        data-bs-target='#logout--modal'>{{ session('hide-login') }}</a>
                </li>


                @endif
                {{-- end if --}}



            </ul>




            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}





            {{-- right --}}
            <div class="navbar-right">


                {{-- phone --}}
                <div class="wrap">
                    <div class="icon"><i class="flaticon-phone-call"></i></div>
                    <div class="text">
                        <p>Need help?</p>
                        <h5><a href="tel:500000000">052 000 0000</a></h5>
                    </div>
                </div>


            </div>
            {{-- endRight --}}



        </div>
    </div>
</nav>
{{-- endNavbar --}}