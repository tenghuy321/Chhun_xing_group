@extends('layouts.master')

@section('content')
    <div class="relative w-full h-[60vh] md:h-[80vh]">
        <div class="absolute inset-0 w-full max-w-7xl mx-auto h-full">
            <img src="{{ asset($realEstate->image) }}" alt="" class="w-full h-full object-cover">
        </div>

        <div data-aos="fade-up" data-aos-duration="1400"
            class="absolute inset-0 flex flex-col items-center justify-center px-2 text-center">
            <h1 class="text-[30px] md:text-[50px] lg:text-[80px] leading-tight font-bold text-gradient uppercase">
                {{ $residence->name[app()->getLocale()] }}
            </h1>
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-10 px-4">
        @php
            $images = json_decode($residence->image, true) ?? [];
        @endphp

        <div x-data="{ open: false, imgSrc: '' }">
            <div class="columns-1 sm:columns-2 md:columns-3 gap-4">
                @foreach ($images as $index => $img)
                    <div class="break-inside-avoid overflow-hidden rounded-[5px] mb-4">
                        <img @click="open = true; imgSrc = '{{ asset($img) }}'" src="{{ asset($img) }}"
                            alt="Residence Image {{ $index + 1 }}" loading="lazy"
                            class="w-full h-auto mb-4 rounded-md object-cover cursor-pointer" />
                    </div>
                @endforeach
            </div>

            <!-- Modal Overlay -->
            <div x-show="open" x-transition
                class="fixed inset-0 z-[50] flex items-center justify-center bg-black bg-opacity-80" style="display: none;">
                <div class="relative">
                    <!-- Close Button -->
                    <button @click="open = false"
                        class="absolute top-2 right-2 w-10 h-10 text-white bg-black bg-opacity-60 hover:bg-opacity-80 rounded-full p-2 text-md">
                        ✕
                    </button>

                    <!-- Image -->
                    <img :src="imgSrc" alt="Popup Image" class="max-w-[90vw] max-h-[90vh] rounded shadow-lg">
                </div>
            </div>
        </div>

        <div class="prose prose-lg max-w-none mt-4 md:mt-10">
            {!! $residence->content[app()->getLocale()] !!}
        </div>

        <a href="{{ route('real-estate-project') }}"
            class="inline-block mt-6 px-4 py-2 bg-gray-800 text-white rounded hover:bg-[#966927] transition-all duration-300 hover:tracking-[0.5px]">
            ← {{ __('messages.back') }}
        </a>
    </div>

    <x-footer :contact="$contact" />
@endsection
