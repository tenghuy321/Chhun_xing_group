@extends('layouts.master')
@section('content')
    <div class="relative w-full h-[60vh] md:h-[80vh]">
        <div class="absolute inset-0 w-full max-w-7xl mx-auto h-full">
            <img src="{{ asset($residence->image) }}" alt="" class="w-full h-full object-cover">
        </div>

        <div data-aos="fade-up" data-aos-duration="1400"
            class="absolute inset-0 flex flex-col items-center justify-center px-2 text-center">
            <h1 class="text-[30px] md:text-[50px] leading-tight font-bold text-white">
                {{ $residence->title[app()->getLocale()] }}
            </h1>
        </div>
    </div>


    {{-- <div class="w-full max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-gradient text-[20px] md:text-[25px] mb-10 font-[600]">
            {{ $service_title->title[app()->getLocale()] }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($service as $item)
                <div class="bg-gradient p-4 rounded-md">
                    <h1 class="text-center text-[16px] md:text-[20px] font-[600] h-auto sm:h-[50px]">
                        {{ $item->title[app()->getLocale()] }}</h1>
                    <div
                        class="prose pt-4 prose-p:text-[#000] prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                        {!! $item->content[app()->getLocale()] !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    <div id="project-reference" class="w-full max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-gradient text-[20px] md:text-[25px] mb-10 font-[600] max-w-[130px] sm:max-w-full">
            {{ $residence->title[app()->getLocale()] }}</h1>

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

            <div class="swiper ExperinceSwiper mt-10 w-full h-full">
                <div class="swiper-wrapper">
                    @forelse ($projectExperince as $index => $experince)
                        @php
                            $images = json_decode($experince->image, true) ?? [];
                        @endphp
                        <div class="swiper-slide w-full h-full">
                            <div class="flex flex-col gap-4 shadow-md">
                                <div class="swiper ProjectExperinceSwiper w-full h-full">
                                    <div class="swiper-wrapper">
                                        @foreach ($images as $img)
                                            <div class="swiper-slide w-full h-full">
                                                <img src="{{ asset($img) }}" loading="lazy"
                                                    alt="{{ $experince->title[app()->getLocale()] }}"
                                                    class="w-full h-[300px] object-cover cursor-pointer"
                                                    onclick="openLightbox('{{ asset($img) }}', '{{ $experince->title[app()->getLocale()] }}')">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="w-full p-2">
                                    <div class="min-h-[60px] flex items-start">
                                        <h1 class="text-[14px] md:text-[16px] font-[600] text-gradient">
                                            {{ $experince->title[app()->getLocale()] }}
                                        </h1>
                                    </div>
                                    <div
                                        class="prose prose-p:m-0 prose-p:text-[#000] prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                                        {!! $experince->content[app()->getLocale()] !!}
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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-6">
            @forelse ($projectExperince as $index => $experince)
                @php
                    $images = json_decode($experince->image, true) ?? [];
                @endphp
                <div class="flex flex-col gap-4 shadow-md">
                    <div class="swiper ProjectExperinceSwiper w-full h-full">
                        <div class="swiper-wrapper">
                            @foreach ($images as $img)
                                <div class="swiper-slide w-full h-full">
                                    <img src="{{ asset($img) }}" loading="lazy"
                                        alt="{{ $experince->title[app()->getLocale()] }}"
                                        class="w-full h-[300px] object-cover cursor-pointer"
                                        onclick="openLightbox('{{ asset($img) }}', '{{ $experince->title[app()->getLocale()] }}')">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="w-full p-2">
                        <div class="min-h-[60px] flex items-start">
                            <h1 class="text-[14px] md:text-[16px] font-[600] text-gradient">
                                {{ $experince->title[app()->getLocale()] }}
                            </h1>
                        </div>
                        <div
                            class="prose prose-p:m-0 prose-p:text-[#000] prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                            {!! $experince->content[app()->getLocale()] !!}
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

    <div id="lightbox"
        class="fixed inset-0 w-full h-full bg-black md:bg-opacity-90 z-50 flex items-center justify-center hidden">
        <div class="relative max-w-4xl w-full h-full p-4 flex items-center justify-center">
            <button onclick="closeLightbox()"
                class="absolute top-0 right-2 text-[#fff] text-3xl md:text-5xl">&times;</button>

            <!-- Prev button -->
            <button id="prevBtn" onclick="prevImage()"
                class="absolute left-6 lg:-left-[30px] text-[#fff] lg:text-[#000] bg-[#000] lg:bg-[#fff] w-6 md:w-10 h-6 md:h-10 rounded-full flex items-center justify-center text-lg md:text-2xl">&#10094;</button>

            <!-- Next button -->
            <button id="nextBtn" onclick="nextImage()"
                class="absolute right-6 lg:-right-[30px] text-[#fff] lg:text-[#000] bg-[#000] lg:bg-[#fff] w-6 md:w-10 h-6 md:h-10 rounded-full flex items-center justify-center text-lg md:text-2xl">&#10095;</button>

            <img id="lightbox-img" class="w-full max-h-[80vh] object-contain" src="" alt="">
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
        let currentImageIndex = 0;
        let currentImageList = [];

        function openLightbox(src, alt) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');

            // Collect all image URLs in current swiper
            const parentSlide = event.target.closest('.swiper-slide');
            currentImageList = Array.from(parentSlide.closest('.swiper-wrapper').querySelectorAll('img'))
                .map(img => img.src);

            // Set current index
            currentImageIndex = currentImageList.indexOf(src);

            // Show lightbox with selected image
            lightboxImg.src = src;
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function prevImage() {
            if (currentImageList.length === 0) return;
            currentImageIndex = (currentImageIndex - 1 + currentImageList.length) % currentImageList.length;
            document.getElementById('lightbox-img').src = currentImageList[currentImageIndex];
        }

        function nextImage() {
            if (currentImageList.length === 0) return;
            currentImageIndex = (currentImageIndex + 1) % currentImageList.length;
            document.getElementById('lightbox-img').src = currentImageList[currentImageIndex];
        }

        // Close lightbox on outside click
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });

        // Close on Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('lightbox').classList.contains('hidden')) {
                closeLightbox();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            } else if (e.key === 'ArrowLeft') {
                prevImage();
            }
        });
    </script>
@endsection
