<nav class="navbar navbar-expand-lg">
    <div class="container">


        {{-- logo --}}
        <div class="logo-wrapper">
            <a class="logo " href="{{ route('subscribe.customization') }}">
                <img src='{{ url("{$storagePath}profile/{$globalProfile->imageFile}") }}' class="logo-img" alt="" />
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
                    <a class="nav-link  dropdown-toggle" href="{{ $globalProfile?->websiteURL }}">Home</a>
                </li>


                {{-- 2: plans --}}
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="{{ route('subscribe.customization') }}"
                        role="button">Meal Plans</a>
                </li>


                {{-- 3: bmi --}}
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle='modal'
                        data-bs-target='#bmi--modal'>BMI Calculator</a></li>



                {{-- 4: blogs --}}
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Blogs</a></li>




                {{-- 4: login --}}
                @if (!Request::is('invoice'))



                @if (!session('hide-login'))

                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" data-bs-toggle='modal'
                        data-bs-target='#login--modal'>Login</a></li>


                {{-- showAccount --}}
                @else


                <li class="nav-item"><a class="nav-link" href="javascript:void(0);"
                        wire:click='loginToPortal'>Profile</a></li>

                @endif
                {{-- end if --}}


                @endif
                {{-- end if --}}


            </ul>




            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}
            {{-- --------------------------------------- --}}





            {{-- right --}}
            <div class="navbar-right">


                {{-- profile --}}
                @if (session('hide-login'))

                <div class="wrap" data-bs-toggle='modal' data-bs-target='#logout--modal' style="cursor: pointer">
                    <div class="icon"><i class='bi bi-person'></i></div>
                    <div class="text">
                        <p>Need help?</p>
                        <h5><a href="tel:{{ $globalProfile?->phone }}">{{ $globalProfile?->phone }}</a></h5>
                    </div>
                </div>


                {{-- phone --}}
                @else

                <div class="wrap">
                    <div class="icon"><i class="flaticon-phone-call"></i></div>
                    <div class="text">
                        <p>Need help?</p>
                        <h5><a href="tel:{{ $globalProfile?->phone }}">{{ $globalProfile?->phone }}</a></h5>
                    </div>
                </div>

                @endif
                {{-- end if --}}







            </div>
            {{-- endRight --}}



        </div>
    </div>
</nav>
{{-- endNavbar --}}