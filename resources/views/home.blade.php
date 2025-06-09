@extends('layouts.master')
@section('content')
    <div class="relative w-full h-[60vh] lg:h-[80vh]">
        <div class="p-0 absolute inset-0 w-full max-w-7xl mx-auto h-full">
            <img src="{{ asset($homepage->image) }}" alt="" class="w-full h-full object-cover">
        </div>

        <div data-aos="fade-up" data-aos-duration="1400" class="absolute inset-0 flex items-center justify-center px-4 text-center">
            <div>
                <p class="text-[18px] md:text-[20px] font-medium text-white">
                    {{ $homepage->title[app()->getLocale()] }}
                </p>
                <h1 class="text-[30px] md:text-[50px] lg:text-[80px] leading-tight font-bold text-white">
                    {{ $homepage->sub_title[app()->getLocale()] }}
                </h1>
                <p class="text-gradient text-[24px] md:text-[28px] lg:text-[30px] font-semibold tracking-wider">
                    {{ $homepage->sub_title1[app()->getLocale()] }}
                </p>
            </div>
        </div>

        {{-- <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-full lg:w-[80%] px-4 sm:px-6 md:px-10 py-6 bg-white">
            <div class="text-center prose max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="1400">
                {!! $homepage->content[app()->getLocale()] !!}
            </div>
        </div> --}}
    </div>
    <x-footer :contact="$contact" />
@endsection
