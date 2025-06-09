@props(['firm_id', 'msf_id', 'team_id', 'mvc_id', 'brc_id', 'why_us_id', 'our_people_id', 'contact'])

<header class="bg-[#fff] h-[4rem] lg:h-[6rem] w-full flex items-center lg:justify-center">
    <div
        class="hidden lg:flex items-center justify-between px-10 w-full max-w-7xl mx-auto text-[#1E1E1E] text-[12px] font-[500]">
        <div class="flex flex-col">
            <div class="flex items-center space-x-1">
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.45854 10.3867C6.51704 10.543 6.4997 10.7204 6.41249 10.8598C6.32474 10.9998 6.17902 11.0832 6.02247 11.0832H4.86813H3.71324C3.55669 11.0832 3.41098 10.9992 3.32323 10.8598C3.23601 10.7204 3.21868 10.543 3.27718 10.3867C3.47598 9.85699 3.85842 9.34772 4.41419 8.87462L4.5767 8.73637C4.74787 8.59053 4.99109 8.59111 5.16173 8.73753L5.32098 8.87462C5.8773 9.35064 6.26028 9.85933 6.45854 10.3867ZM9.12907 11.6806C8.76018 11.4058 8.25424 11.5038 7.99856 11.9022C7.85827 12.1204 7.62859 12.2499 7.38374 12.2499H2.36606C2.14884 12.2499 1.94245 12.1473 1.79945 11.9693C1.71982 11.869 1.5909 11.6561 1.63261 11.358C1.81516 10.0489 2.5784 8.81395 3.90121 7.68632C4.09568 7.52006 4.20943 7.26747 4.20943 7.00029C4.20943 6.73311 4.09568 6.47994 3.90121 6.31426C2.5784 5.18663 1.81462 3.95108 1.63261 2.64203C1.5909 2.34393 1.71928 2.13159 1.79945 2.03125C1.94245 1.85274 2.14884 1.75066 2.36606 1.75066H7.38429C7.60096 1.75066 7.80735 1.85216 7.94981 2.03009C8.24232 2.39527 8.75477 2.43669 9.09549 2.12109C9.43567 1.80549 9.47305 1.25305 9.17999 0.886704C8.72876 0.323181 8.07386 7.85552e-07 7.38429 7.85552e-07H2.36606C1.6754 -0.000582572 1.01995 0.323764 0.568183 0.888454C0.122913 1.44556 -0.0753461 2.17943 0.0259502 2.90162C0.232876 4.38452 0.948992 5.75949 2.15805 6.99971C0.948992 8.23993 0.232876 9.6149 0.0259502 11.0978C-0.0753461 11.82 0.122913 12.5539 0.568183 13.111C1.01995 13.6762 1.6754 14 2.36606 14H7.38429C8.1627 14 8.89181 13.5882 9.33546 12.898C9.59114 12.5008 9.49851 11.9553 9.12907 11.6806ZM13 6.99971C13 8.93296 11.545 10.4999 9.74985 10.4999C7.95469 10.4999 6.4997 8.93296 6.4997 6.99971C6.4997 5.06646 7.95469 3.49956 9.74985 3.49956C11.545 3.49956 13 5.06646 13 6.99971ZM11.1041 7.63324L10.2915 6.7582V5.24964C10.2915 4.92762 10.0489 4.66628 9.74985 4.66628C9.45084 4.66628 9.20816 4.92762 9.20816 5.24964V6.7582C9.20816 7.06738 9.32246 7.36431 9.52559 7.58307L10.3381 8.4581C10.5499 8.68561 10.8928 8.68561 11.1041 8.4581C11.3159 8.23001 11.3159 7.86075 11.1041 7.63324Z"
                        fill="url(#paint0_linear_2005_768)" />
                    <defs>
                        <linearGradient id="paint0_linear_2005_768" x1="6.5" y1="0" x2="6.5"
                            y2="14" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FFD98B" />
                            <stop offset="1" stop-color="#966927" />
                        </linearGradient>
                    </defs>
                </svg>

                <span>Monday - Friday 8am - 5pm</span>
            </div>
            <div class="flex items-center space-x-1">
                <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.0208 0H2.97917C2.18931 0.000866274 1.43204 0.317215 0.873528 0.879636C0.315012 1.44206 0.000860259 2.20462 0 3L0 9C0.000860259 9.79538 0.315012 10.5579 0.873528 11.1204C1.43204 11.6828 2.18931 11.9991 2.97917 12H10.0208C10.8107 11.9991 11.568 11.6828 12.1265 11.1204C12.685 10.5579 12.9991 9.79538 13 9V3C12.9991 2.20462 12.685 1.44206 12.1265 0.879636C11.568 0.317215 10.8107 0.000866274 10.0208 0ZM10.0208 1.63636C10.3493 1.63746 10.666 1.75994 10.9108 1.98055L7.38996 5.526C7.15082 5.756 6.83285 5.88434 6.50217 5.88434C6.17148 5.88434 5.85351 5.756 5.61438 5.526L2.09354 1.98055C2.33721 1.76093 2.65216 1.63853 2.97917 1.63636H10.0208ZM10.0208 10.3636H2.97917C2.62002 10.3636 2.27558 10.22 2.02163 9.96424C1.76767 9.70851 1.625 9.36166 1.625 9V3.82745L4.46279 6.68509C4.73025 6.95453 5.04779 7.16827 5.3973 7.3141C5.7468 7.45992 6.12141 7.53498 6.49973 7.53498C6.87805 7.53498 7.25266 7.45992 7.60216 7.3141C7.95167 7.16827 8.26921 6.95453 8.53667 6.68509L11.375 3.82745V9C11.375 9.36166 11.2323 9.70851 10.9784 9.96424C10.7244 10.22 10.38 10.3636 10.0208 10.3636Z"
                        fill="url(#paint0_linear_2005_767)" />
                    <defs>
                        <linearGradient id="paint0_linear_2005_767" x1="6.5" y1="0" x2="6.5"
                            y2="12" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FFD98B" />
                            <stop offset="1" stop-color="#966927" />
                        </linearGradient>
                    </defs>
                </svg>

                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contact->email }}">{{ $contact->email }}</a>
            </div>
        </div>

        {{-- logo --}}
        <div class="">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-24 h-auto object-cover">
        </div>

        <div class="flex flex-col">
            <div class="flex items-center space-x-14">
                <div>
                    @php
                        $locale = session('locale', app()->getLocale());
                    @endphp

                    <div>
                        @if ($locale === 'en')
                            <a href="{{ route('lang.switch', 'kh') }}">ភាសាខ្មែរ</a>
                        @else
                            <a href="{{ route('lang.switch', 'en') }}">English</a>
                        @endif
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <span>Follow</span>
                    <a href="{{ $contact->facebook }}">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.96752 -1.90735e-05C3.12565 -1.90735e-05 0 3.12563 0 6.9675C0 10.8091 3.12565 13.935 6.96752 13.935C10.8091 13.935 13.935 10.8091 13.935 6.9675C13.935 3.12563 10.8097 -1.90735e-05 6.96752 -1.90735e-05ZM8.70028 7.2128H7.56672V11.2531H5.887C5.887 11.2531 5.887 9.04547 5.887 7.2128H5.08854V5.78483H5.887V4.86119C5.887 4.19969 6.20134 3.16604 7.58216 3.16604L8.82686 3.17081V4.55696C8.82686 4.55696 8.07049 4.55696 7.92343 4.55696C7.77637 4.55696 7.56728 4.6305 7.56728 4.94595V5.78511H8.84706L8.70028 7.2128Z"
                                fill="url(#paint0_linear_2005_778)" />
                            <defs>
                                <linearGradient id="paint0_linear_2005_778" x1="6.96752" y1="-1.90735e-05"
                                    x2="6.96752" y2="13.935" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFD98B" />
                                    <stop offset="1" stop-color="#966927" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{ $contact->telegram }}">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.96752 13.935C10.8156 13.935 13.935 10.8156 13.935 6.9675C13.935 3.11945 10.8156 -1.90735e-05 6.96752 -1.90735e-05C3.11946 -1.90735e-05 0 3.11945 0 6.9675C0 10.8156 3.11946 13.935 6.96752 13.935Z"
                                fill="url(#paint0_linear_2005_781)" />
                            <path
                                d="M3.18829 6.81651L9.90614 4.22634C10.2179 4.11369 10.4902 4.3024 10.3892 4.77387L10.3898 4.77329L9.24596 10.1621C9.16119 10.5441 8.93417 10.637 8.61657 10.457L6.87469 9.17328L6.03452 9.98267C5.94162 10.0756 5.86323 10.154 5.68324 10.154L5.80691 8.3813L9.0352 5.46481C9.17571 5.34114 9.00384 5.27146 8.81862 5.39456L4.82914 7.90635L3.10932 7.36985C2.73598 7.2514 2.72785 6.99651 3.18829 6.81651Z"
                                fill="white" />
                            <defs>
                                <linearGradient id="paint0_linear_2005_781" x1="6.96752" y1="-1.90735e-05"
                                    x2="6.96752" y2="13.935" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFD98B" />
                                    <stop offset="1" stop-color="#966927" />
                                </linearGradient>
                            </defs>
                        </svg>

                    </a>
                </div>
            </div>
            <div class="flex items-center space-x-4">

                <span><a href="tel:{{ $contact->phone_number1 }}">{{ $contact->phone_number1 }}</a> / <a
                        href="tel:{{ $contact->phone_number2 }}">{{ $contact->phone_number2 }}</a> </span>

                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.0029 1.04325L11.4123 0.52881C10.6699 -0.185996 9.48312 -0.18058 8.72989 0.572132L7.60817 1.78513C7.25052 2.14254 7.05002 2.61907 7.05002 3.1281C7.05002 3.63713 7.2451 4.10825 7.60275 4.46566L7.81951 4.68226C7.13131 6.13353 6.10171 7.16242 4.69821 7.81224L4.47603 7.59564C4.11838 7.23823 3.64152 7.04329 3.13756 7.04329C2.6336 7.04329 2.15673 7.23823 1.81534 7.57939L0.558149 8.74366C0.2005 9.10106 0 9.5776 0 10.0866C0 10.5957 0.189662 11.0505 0.531055 11.4025C0.531055 11.4025 1.03501 11.9819 1.04585 11.9928C1.69612 12.6426 2.57399 13 3.51688 13C7.59191 13 13 7.59564 13 3.52341C13 2.58117 12.6424 1.70391 11.9921 1.05408L12.0029 1.04325ZM3.52772 11.3646C3.02918 11.3646 2.56315 11.1805 2.22176 10.8502C2.22176 10.8502 1.72322 10.2762 1.70696 10.2653C1.63652 10.1949 1.62568 10.1137 1.62568 10.0758C1.62568 10.0379 1.63652 9.95125 1.68529 9.90792L2.94248 8.74366C3.01292 8.67326 3.09421 8.66243 3.13214 8.66243C3.17007 8.66243 3.25677 8.67326 3.3218 8.74366L3.93414 9.35016C4.16173 9.57218 4.49771 9.64258 4.79575 9.52886C7.01751 8.68409 8.61067 7.09202 9.52647 4.80681C9.64569 4.50898 9.58066 4.1624 9.35306 3.93497L8.74614 3.31763C8.6757 3.24724 8.66486 3.16601 8.66486 3.1281C8.66486 3.0902 8.6757 3.00355 8.76782 2.91691L9.88954 1.70391C9.99792 1.60102 10.1659 1.60102 10.2743 1.70391C10.2851 1.71474 10.8595 2.21835 10.8595 2.21835C11.1901 2.55951 11.3743 3.0198 11.3743 3.52341C11.3743 6.98914 6.50271 11.3754 3.51688 11.3754L3.52772 11.3646Z"
                        fill="url(#paint0_linear_2005_771)" />
                    <defs>
                        <linearGradient id="paint0_linear_2005_771" x1="6.5" y1="0" x2="6.5"
                            y2="13" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FFD98B" />
                            <stop offset="1" stop-color="#966927" />
                        </linearGradient>
                    </defs>
                </svg>

            </div>
        </div>
    </div>

    <div class="lg:hidden flex items-center justify-between w-full h-full px-4">

        <div>
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-10 h-auto object-cover">
        </div>

        <div class="flex items-center text-[12px] gap-4">
            <div>
                @php
                    $locale = session('locale', app()->getLocale());
                @endphp

                <div>
                    @if ($locale === 'en')
                        <a href="{{ route('lang.switch', 'kh') }}">ភាសាខ្មែរ</a>
                    @else
                        <a href="{{ route('lang.switch', 'en') }}">English</a>
                    @endif
                </div>
            </div>

            <button class="" type="button" data-drawer-target="drawer-example"
                data-drawer-show="drawer-example" aria-controls="drawer-example">
                <svg class="w-6 h-6 text-[#1e1e1e]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M5 7h14M5 12h14M5 17h10" />
                </svg>
            </button>
        </div>

        <!-- drawer component -->
        <div id="drawer-example"
            class="fixed top-0 left-0 z-40 h-screen overflow-y-auto transition-transform -translate-x-full bg-white w-80"
            tabindex="-1" aria-labelledby="drawer-label">
            <div class="flex items-center justify-between p-4">
                <div>
                    <img src="{{ asset('assets/images/logo-new.png') }}" alt=""
                        class="w-10 h-auto object-cover">
                </div>
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                    class="text-[#1e1e1e] rounded-lg text-sm w-8 h-8 flex items-center justify-center">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
            </div>
            <hr class="h-[2px] bg-gradient">

            <ul class="flex flex-col items-center gap-4 mt-4 text-[16px] p-4">
                <li class="w-full">
                    <a href="{{ route('home') }}"
                        class="py-3 px-4 rounded-md block w-full text-[#1e1e1e] {{ Request::routeIs('home') ? 'bg-gradient font-[600]' : '' }}">
                        {{ __('messages.Home') }}
                    </a>
                </li>
                <li class="w-full" x-data="{ openAbout: false }">
                    <div class="flex justify-between items-center w-full">
                        <a href="{{ route('about-us') }}"
                            class="py-3 px-4 rounded-md block w-full text-[#1e1e1e] {{ Request::routeIs('about-us') ? 'bg-gradient font-[600]' : '' }}">
                            {{ __('messages.About Us') }}
                        </a>
                        <button @click="openAbout = !openAbout" class="text-lg px-2 focus:outline-none">
                            <span x-text="openAbout ? '×' : '+'"></span>
                        </button>
                    </div>

                    <div x-show="openAbout" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-40"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 max-h-40" x-transition:leave-end="opacity-0 max-h-0"
                        class="ml-4 mt-2 space-y-1 overflow-hidden"">
                        <!-- Dropdown content -->
                        <a href="{{ route('about-us') }}#{{ Str::slug($firm_id->title['en']) }}"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">{{ $firm_id->title[app()->getLocale()] }}</a>
                        <a href="{{ route('about-us') }}#{{ Str::slug($msf_id->title['en']) }}"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">{{ $msf_id->title[app()->getLocale()] }}</a>
                        <a href="{{ route('about-us') }}#{{ Str::slug($team_id->title['en']) }}"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">{{ $team_id->title[app()->getLocale()] }}</a>
                        <a href="{{ route('about-us') }}#{{ Str::slug($our_people_id->title['en']) }}"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">{{ $our_people_id->title[app()->getLocale()] }}</a>
                        <a href="{{ route('about-us') }}#vision-mission-core" data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">
                            @foreach ($mvc_id as $item)
                                {{ $item->title[app()->getLocale()] }}
                            @endforeach
                        </a>
                        <a href="{{ route('about-us') }}#{{ Str::slug($brc_id->title['en']) }}"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">{{ $brc_id->title[app()->getLocale()] }}</a>
                        <a href="{{ route('about-us') }}#{{ Str::slug($why_us_id->title['en']) }}"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">{{ $why_us_id->title[app()->getLocale()] }}</a>
                    </div>
                </li>
                <li class="w-full" x-data="{ openService: false }">
                    <div class="flex justify-between items-center w-full">
                        <a href="{{ route('residence-project') }}"
                            class="py-3 px-4 rounded-md block w-full text-[#1e1e1e] {{ Request::routeIs('residence-project') ? 'bg-gradient font-[600]' : '' }}">
                            {{ __('messages.Our Services') }}
                        </a>
                        <button @click="openService = !openService" class="text-lg px-2 focus:outline-none">
                            <span x-text="openService ? '×' : '+'"></span>
                        </button>
                    </div>

                    <div x-show="openService" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-40"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 max-h-40" x-transition:leave-end="opacity-0 max-h-0"
                        class="ml-4 mt-2 space-y-1 overflow-hidden">
                        <!-- Dropdown content -->
                        <a href="{{ route('residence-project') }}#project-reference"
                            data-drawer-hide="drawer-example"
                            class="block py-2 px-4 rounded hover:bg-gray-100">Project References</a>
                    </div>
                </li>
                <li class="w-full">
                    <a href="{{ route('real-estate-project') }}"
                        class="py-3 px-4 rounded-md block w-full text-[#1e1e1e] {{ Request::routeIs('real-estate-project') ? 'bg-gradient font-[600]' : '' }}">
                        {{ __('messages.Real Estate Project') }}
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('contact-us') }}"
                        class="py-3 px-4 rounded-md block w-full text-[#1e1e1e] {{ Request::routeIs('contact-us') ? 'bg-gradient font-[600]' : '' }}">
                        {{ __('messages.Contact') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
