@extends('layouts.master')
@section('css')
    <style>
        .custom-prose ul>li::marker,
        .custom-prose ol>li::marker {
            color: #fff;
        }

        .hide-scrollbar::-webkit-scrollbar {
            width: 0px;
            height: 0px;
        }

        /* For Firefox */
        .hide-scrollbar {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
    </style>
@endsection
@section('content')
    <div class="relative w-full h-[60vh] md:h-[80vh]">
        <div class="absolute inset-0 w-full max-w-7xl mx-auto h-full">
            <img src="{{ asset($realEstate->image) }}" alt="" class="w-full h-full object-cover">
        </div>

        <div data-aos="fade-up" data-aos-duration="1400"
            class="absolute inset-0 flex flex-col items-center justify-center px-2 text-center">
            <h1 class="text-[30px] md:text-[50px] leading-tight font-bold text-white">
                {{ $realEstate->title[app()->getLocale()] }}
            </h1>
            <div
                class="prose pt-4 text-center prose-p:text-[#fff] prose-h1:text-[#fff] prose-h2:text-[#fff] prose-h3:text-[#fff] prose-ul:text-[#fff] prose-ol:text-[#fff] prose-ul:marker:text-[#fff]">
                {!! $realEstate->content[app()->getLocale()] !!}
            </div>
        </div>
    </div>

    <div class="w-full max-w-7xl mx-auto px-4 pb-4 pt-10 md:py-10">
        <h1 class="text-gradient text-[20px] md:text-[25px] max-w-[200px] md:max-w-full mb-6 md:mb-10 font-[600]">
            {{ $realEstate_title->title[app()->getLocale()] }}</h1>

        {{-- <div class="relative">
            <div class="absolute -top-[15%] right-0 z-10 flex gap-2 p-2">
                <button
                    class="custom-prev bg-[#966927] p-0 text-white w-10 h-10 rounded-full flex items-center justify-center">
                    <i class='bx bx-left-arrow'></i>
                </button>
                <button
                    class="custom-next bg-[#966927] p-0 text-white w-10 h-10 rounded-full flex items-center justify-center">
                    <i class='bx bx-right-arrow'></i>
                </button>
            </div>

            <div class="swiper MainSwiper mt-6 md:mt-10 w-full h-full">
                <div class="swiper-wrapper">
                    @forelse ($project as $index => $pro)
                        @php
                            $images = json_decode($pro->image, true) ?? [];
                        @endphp
                        <div class="swiper-slide w-full h-full">
                            <div class="flex flex-col gap-4 shadow-md">
                                <div class="swiper ProjectSwiper w-full h-full">
                                    <div class="swiper-wrapper">
                                        @foreach ($images as $img)
                                            <div class="swiper-slide w-full h-full">
                                                <img src="{{ asset($img) }}" alt="{{ $pro->name[app()->getLocale()] }}"
                                                    loading="lazy" class="w-full h-[300px] object-cover cursor-pointer"
                                                    onclick="openLightbox('{{ asset($img) }}', '{{ $pro->name[app()->getLocale()] }}')">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="w-full p-2">
                                    <h1 class="text-[14px] md:text-[16px] font-[600] text-gradient">
                                        {{ $pro->name[app()->getLocale()] }}
                                    </h1>
                                    <div
                                        class="prose prose-p:m-0 prose-p:text-[#000] prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                                        {!! $pro->content[app()->getLocale()] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-12 text-center py-10">
                            <p>No projects found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div> --}}

        @forelse ($project as $index => $pro)
            @php
                $images = json_decode($pro->image, true) ?? [];
                $isOdd = ($index + 1) % 2 === 1;
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-12 items-center gap-6 md:gap-x-20 w-full mb-20 mt-10">
                {{-- Image --}}
                <div class="md:col-span-6 w-full h-full {{ $isOdd ? 'order-1' : 'order-2' }}">
                    <div class="swiper ProjectSwiper w-full h-full">
                        <div class="swiper-wrapper w-full h-full">
                            @foreach ($images as $img)
                                <div class="swiper-slide w-full h-full">
                                    <img src="{{ asset($img) }}" alt="{{ $pro->name[app()->getLocale()] }}" loading="lazy"
                                        class="w-full h-[250px] md:h-[400px] object-cover object-top cursor-pointer"
                                        onclick="openLightbox('{{ asset($img) }}', '{{ $pro->name[app()->getLocale()] }}')">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                {{-- Text --}}
                <div class="md:col-span-6 w-full p-2 {{ $isOdd ? 'order-1 md:order-2' : 'order-2 md:order-1' }}">
                    <h1 class="text-[20px] md:text-[25px] font-semibold text-gradient mb-4">
                        {{ $pro->name[app()->getLocale()] }}
                    </h1>
                    <div class="prose prose-p:m-0 prose-p:text-[#000]">
                        {!! $pro->content[app()->getLocale()] !!}
                    </div>
                </div>
            </div>
        @empty
            <div class="md:col-span-12 text-center py-10">
                <p>No projects found</p>
            </div>
        @endforelse

    </div>

    <!-- Lightbox HTML -->
    <div id="lightbox"
        class="fixed inset-0 w-full h-full bg-black md:bg-opacity-90 z-50 flex items-center justify-center hidden">
        <div class="relative max-w-4xl w-full h-full p-4 flex items-center justify-center">
            <button onclick="closeLightbox()"
                class="absolute top-0 right-2 text-white text-3xl md:text-5xl hover:text-gray-300">&times;</button>
            <img id="lightbox-img" class="w-full max-h-[80vh] object-contain" src="" alt="">
        </div>
    </div>


    {{-- Our Project Special Features --}}
    {{-- <div class="w-full max-w-7xl mx-auto px-4 pt-10 md:pt-20 pb-10">
        <h1 class="text-gradient text-[20px] md:text-[25px] mb-10 font-[600]">
            {{ $special_title->title[app()->getLocale()] }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($special_project as $item)
                <div
                    class="flex flex-col items-center space-y-2 border border-gray-300 shadow-md rounded-md p-10 text-[13px] md:text-[15px]">
                    <img src="{{ $item->icon }}" alt="" class="w-20 h-24">
                    <p class="text-center pt-2">{{ $item->title[app()->getLocale()] }}</p>
                </div>
            @endforeach
        </div>
    </div> --}}

    <div class="w-full max-w-7xl mx-auto px-4 py-4 md:py-10">
        <h1 class="text-gradient text-[20px] md:text-[25px] font-[600] mb-10 max-w-[250px] md:max-w-full">
            {{ $residentialProjects->title[app()->getLocale()] }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($residence_image as $item)
                @php
                    $images = json_decode($item->image, true) ?? [];
                @endphp
                <div class="relative w-full h-full group overflow-hidden">
                    <img src="{{ asset($images[0]) }}" alt="" class="w-full h-[300px] object-cover" loading="lazy">

                    <div
                        class="absolute w-full h-full text-[12px] p-4 left-0 bottom-0 translate-y-full bg-black/50 group-hover:translate-y-0 transition-all duration-300 text-[#fff] overflow-y-auto hide-scrollbar">

                        <h1 class="text-[14px] md:text-[15px] font-[700] uppercase">
                            {{ $item->name[app()->getLocale()] }}
                        </h1>

                        <hr class="h-[2px] my-1 bg-[#fff] border-0">

                        <div
                            class="custom-prose prose mt-2 prose-p:text-[#fff] prose-li:m-0 prose-strong:text-white prose-h1:text-[#fff] prose-h2:text-[#fff] prose-h3:text-[#fff] prose-ul:text-[#fff] prose-ol:text-[#fff] prose-ul:marker:text-[#fff]">
                            {!! $item->content[app()->getLocale()] !!}
                        </div>

                        <div
                            class="mt-2 block px-4 py-2 bg-[#fff] text-[#000] hover:text-[#966927] transition-all duration-200 hover:tracking-[0.5px] rounded-[30px] font-[500] ml-auto w-fit">
                            <a href="{{ route('more_details', ['id' => $item->id]) }}">{{ __('messages.read_more') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <x-footer :contact="$contact" />
@endsection
@section('css')
    <style>
        #lightbox {
            transition: opacity 0.3s ease;
        }
    </style>
@endsection
@section('js')
    <script>
        function openLightbox(src, alt) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');

            lightboxImg.src = src;
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when lightbox is open
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Close lightbox when clicking outside the image
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        // Close lightbox with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('lightbox').classList.contains('hidden')) {
                closeLightbox();
            }
        });
    </script>
@endsection
