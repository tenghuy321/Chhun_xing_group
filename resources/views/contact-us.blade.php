@extends('layouts.master')
@section('content')
    <div class="relative w-full h-screen">
        <div class="absolute inset-0 w-full max-w-7xl mx-auto">
            <img src="{{ asset('assets/images/banner.png') }}" alt="" class="w-full h-full object-cover">
        </div>

        <div data-aos="fade-up" data-aos-duration="1400"
            class="absolute inset-0 flex flex-col items-center justify-center px-2 text-center">
            <h1 class="text-[30px] md:text-[50px] lg:text-[80px] leading-tight font-bold text-white">
                {{ __('messages.Contact') }}
            </h1>

            <div class="w-full max-w-4xl grid grid-cols-1 sm:grid-cols-3 mx-auto px-4 gap-4 py-4 xl:py-10">
                <div class="flex flex-col space-y-1 text-[12px] text-[#fff]">
                    <h1 class="text-[18px] text-gradient font-[600] mb-1 sm:mb-4 text-start sm:text-end">Information</h1>
                    <ul class="flex flex-col items-start sm:items-end">
                        <li>
                            <a href="{{ route('home') }}" class="">
                                {{ __('messages.Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}" class="">
                                {{ __('messages.About Us') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('residence-project') }}" class="">
                                {{ __('messages.Project References') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('real-estate-project') }}" class="">
                                {{ __('messages.Real Estate Project') }}

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us') }}" class="">
                                {{ __('messages.Contact') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col space-y-1 text-[12px]">
                    <h1 class="text-[18px] text-gradient font-[600] mb-4 text-start sm:text-center">Follow</h1>

                    <div class="flex space-x-2 items-start sm:items-center justify-start sm:justify-center">
                        <a href="{{ $contact->facebook }}">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="17.5" cy="18.5" r="17.5" fill="url(#paint0_linear_40_67)" />
                                <path
                                    d="M35.5355 18.1262C35.5355 26.9948 29.0378 34.3455 20.544 35.6781V23.2622H24.684L25.4718 18.1262H20.544V14.7933C20.544 13.3879 21.2325 12.0185 23.4396 12.0185H25.68V7.64596C25.68 7.64596 23.6464 7.29893 21.7024 7.29893C17.6442 7.29893 14.9916 9.75866 14.9916 14.2117V18.1262H10.4802V23.2622H14.9916V35.6781C6.49773 34.3455 0 26.9948 0 18.1262C0 8.31364 7.95524 0.358398 17.7678 0.358398C27.5803 0.358398 35.5355 8.31364 35.5355 18.1262Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_40_67" x1="17.5" y1="1" x2="17.5"
                                        y2="36" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD98B" />
                                        <stop offset="1" stop-color="#966927" />
                                    </linearGradient>
                                </defs>
                            </svg>

                        </a>
                        <a href="{{ $contact->telegram }}">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="18" cy="18" r="17" fill="url(#paint0_linear_40_68)" />
                                <path
                                    d="M17.7795 35.8939C27.5947 35.8939 35.5472 27.9414 35.5472 18.1262C35.5472 8.31095 27.5947 0.358398 17.7795 0.358398C7.96427 0.358398 0.0117188 8.31095 0.0117188 18.1262C0.0117188 27.9414 7.96427 35.8939 17.7795 35.8939ZM8.14195 17.7412L25.273 11.136C26.0681 10.8488 26.7626 11.33 26.5049 12.5323L26.5064 12.5308L23.5895 26.2727C23.3734 27.2469 22.7944 27.4839 21.9845 27.0249L17.5426 23.7511L15.4001 25.8152C15.1632 26.0521 14.9633 26.252 14.5043 26.252L14.8197 21.7315L23.0521 14.2942C23.4104 13.9789 22.9721 13.8012 22.4998 14.1151L12.3263 20.5204L7.94058 19.1523C6.98853 18.8502 6.9678 18.2002 8.14195 17.7412Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_40_68" x1="18" y1="1" x2="18"
                                        y2="35" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD98B" />
                                        <stop offset="1" stop-color="#966927" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex flex-col space-y-1 text-[12px] text-start text-[#fff]">
                    <h1 class="text-[18px] text-gradient font-[600] mb-4">Keep In Touch</h1>
                    <p>{{ $contact->location[app()->getLocale()] }}</p>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contact->email }}">{{ $contact->email }}</a>
                    <span><a href="tel:{{ $contact->phone_number1 }}">{{ $contact->phone_number1 }}</a> / <a
                            href="tel:{{ $contact->phone_number2 }}">{{ $contact->phone_number2 }}</a> </span>
                </div>
            </div>

            <div class="w-full max-w-7xl mx-auto px-2">
                <div class="flex flex-col font-[700] pt-4">
                    <h1 class="text-[30px] md:text-[40px] text-[#fff]">{{ __('messages.CHHUN XING') }}</h1>
                    <p class="text-[16px] md:text-[20px] text-gradient">{{ __('messages.CITY') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gradient1 w-full max-w-6xl mx-auto h-[2rem] flex items-center justify-center">
        <p class="text-[14px] text-[#1e1e1e]">All Right Reserved 2025</p>
    </div>
@endsection
