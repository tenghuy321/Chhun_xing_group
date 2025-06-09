@extends('layouts.master')

@section('content')
    <section class="relative w-full h-[60vh] md:h-[80vh]">
        <div class="p-0 absolute inset-0 w-full max-w-7xl mx-auto h-full">
            <img src="{{ asset($aboutpage->image) }}" alt="" class="w-full h-full object-cover">
        </div>

        <div class="absolute inset-0 flex flex-col items-center justify-center px-4 text-center">
            <h1 class="text-[30px] md:text-[50px] lg:text-[80px] leading-tight font-bold text-white" data-aos="fade-up"
                data-aos-duration="1400">
                {{ $aboutpage->title[app()->getLocale()] }}
            </h1>
            <div data-aos="fade-up" data-aos-duration="1400"
                class="prose pt-2 text-center prose-p:text-[#fff] prose-h1:text-[#fff] prose-h2:text-[#fff] prose-h3:text-[#fff] prose-ul:text-[#fff] prose-ol:text-[#fff] prose-ul:marker:text-[#fff]">
                {!! $aboutpage->content[app()->getLocale()] !!}
            </div>
        </div>
    </section>

    {{-- history --}}
    <section id="{{ Str::slug($firm_id->title['en']) }}" class="w-full max-w-7xl mx-auto px-4 py-10 md:py-20">
        <div class="relative">
            <div class="absolute left-1/2 w-1 h-full bg-gradient transform -translate-x-1/2"></div>
            <div>
                @forelse ($history as $index => $item)
                    @php
                        $images = json_decode($item->image, true) ?? [];
                    @endphp
                    @if (($index + 1) % 2 === 1)
                        <div
                            class="mb-32 flex flex-col md:flex-row justify-between items-center w-full relative overflow-hidden">
                            <div data-aos="fade-right" data-aos-duration="1400"
                                class="order-1 md:order-1 md:w-5/12 px-2 md:px-4 py-4 bg-white rounded-lg shadow-md mt-8 md:mt-0 mr-0 md:mr-8">
                                <h3 class="text-gradient font-[600] text-[20px] mt-1">{{ $item->title[app()->getLocale()] }}
                                </h3>
                                <div
                                    class="prose mt-2 prose-p:text-[#000] text-justify prose-p:mx-0 prose-p:my-2 prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                                    {!! $item->content[app()->getLocale()] !!}</div>
                            </div>

                            <div
                                class="absolute left-1/2 w-6 h-6 bg-gradient rounded-full transform -translate-x-1/2 border-4 border-white">
                            </div>

                            <div data-aos="fade-left" data-aos-duration="1400"
                                class="order-1 md:order-2 mt-2 md:mt-0 w-full px-2 md:px-0 md:w-5/12 flex justify-center md:justify-start mb-4 md:mb-0">
                                <div class="w-full h-full grid grid-cols-2 gap-2 rounded-md overflow-hidden">
                                    @foreach ($images as $img)
                                        @if (!empty($img))
                                            <img src="{{ asset($img) }}" alt="" loading="lazy"
                                                class="w-full h-[200px] object-top {{ count(array_filter($images)) === 1 ? 'col-span-2 object-cover md:object-contain' : 'object-cover' }}">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mb-32 flex flex-col md:flex-row justify-between items-center w-full relative overflow-hidden">
                            <div data-aos="fade-right" data-aos-duration="1400"
                                class="order-2 md:order-1 mt-2 md:mt-0 w-full px-2 md:px-0 md:w-5/12 flex justify-center md:justify-end mb-4 md:mb-0">
                                <div class="w-full h-full grid grid-cols-2 gap-2 rounded-md overflow-hidden">
                                    @foreach ($images as $img)
                                        @if (!empty($img))
                                            <img src="{{ asset($img) }}" alt="" loading="lazy"
                                                class="w-full h-[200px] object-top {{ count(array_filter($images)) === 1 ? 'col-span-2 object-cover md:object-contain' : 'object-cover' }}">
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div
                                class="absolute left-1/2 w-6 h-6 bg-gradient rounded-full transform -translate-x-1/2 border-4 border-white">
                            </div>

                            <div data-aos="fade-left" data-aos-duration="1400"
                                class="order-1 md:w-5/12 px-2 md:px-4 py-4 bg-white rounded-lg shadow-md mt-8 md:mt-0 ml-0 md:ml-8">
                                <h3 class="text-gradient font-[600] text-[20px] mt-1">{{ $item->title[app()->getLocale()] }}
                                </h3>
                                <div
                                    class="prose mt-2 text-justify prose-p:text-[#000] prose-p:mx-0 prose-p:my-2 prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                                    {!! $item->content[app()->getLocale()] !!}</div>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Content to show when $history is empty -->
                    <div class="text-center py-8">
                        <p>No history items found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- message --}}
    <section id="{{ Str::slug($msf_id->title['en']) }}" class="w-full bg-gradient1">
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 px-4 pt-10 items-end overflow-hidden">
            <div class="order-2 md:order-none w-[80%] md:w-full" data-aos="fade-right" data-aos-duration="1400">
                <img src="{{ asset($msg->image) }}" alt="">
            </div>

            <div class="order-1 md:order-none md:col-span-2" data-aos="fade-left" data-aos-duration="1400">
                <h3 class="text-[20px] md:text-[25px] font-[600] text-[#fff]">{{ $msg_title->title[app()->getLocale()] }}
                </h3>
                <div
                    class="prose py-4 text-justify prose-p:text-[#fff] prose-p:m-0 prose-h1:text-[#fff] prose-h2:text-[#fff] prose-h3:text-[#fff] prose-ul:text-[#fff] prose-ol:text-[#fff] prose-ul:marker:text-[#fff]">
                    {!! $msg->content[app()->getLocale()] !!}
                </div>
            </div>
        </div>
    </section>

    {{-- team --}}
    <section id="{{ Str::slug($team_id->title['en']) }}" class="w-full max-w-7xl mx-auto pt-10">
        <h1 class="text-[20px] md:text-[25px] font-[600] text-[#1e1e1e] text-center" data-aos="fade-up" data-aos-duration="1400">
            {{ $ourTeamTitle->title[app()->getLocale()] }}</h1>

        <div class="w-full pt-20">
            @if ($our_team->count() > 0)
                @php $first = $our_team->first(); @endphp
                <div class="w-full flex flex-col items-center justify-center font-[600]" data-aos="fade-up"
                    data-aos-duration="1400">
                    <div class="w-32 h-32 sm:w-40 xl:w-52 sm:h-40 xl:h-52 rounded-full overflow-hidden">
                        <img src="{{ asset($first->image) }}" alt="Team Member" loading="lazy"
                            class="w-full h-full object-cover" style="object-position: center top;" />
                    </div>
                    <h1 class="text-[16px] text-[#1e1e1e] mt-2">{{ $first->name[app()->getLocale()] }}</h1>
                    <p class="text-[14px] text-[#966927]">{{ $first->position[app()->getLocale()] }}</p>
                </div>
            @endif

            @php $team_chunks = $our_team->slice(1)->chunk(4); @endphp

            @foreach ($team_chunks as $chunk)
                <div class="w-full flex flex-wrap justify-center gap-10 xl:gap-20 font-[600] px-2"
                    data-aos="fade-up" data-aos-duration="1400">
                    @foreach ($chunk as $item)
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-32 h-32 sm:w-40 xl:w-52 sm:h-40 xl:h-52 rounded-full overflow-hidden">
                                <img src="{{ asset($item->image) }}" alt="Team Member" loading="lazy"
                                    class="w-full h-full object-cover" style="object-position: center top;" />
                            </div>
                            <h1 class="text-[16px] text-[#1e1e1e] mt-4">{{ $item->name[app()->getLocale()] }}</h1>
                            <p class="text-[14px] text-[#966927] w-[240px] h-[50px] text-center">
                                {{ $item->position[app()->getLocale()] }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    {{-- people --}}
    <section id="{{ Str::slug($our_people_id->title['en']) }}" class="w-full max-w-7xl mx-auto pt-10 md:pt-20 md:pb-40">
        <h1 class="text-[20px] md:text-[25px] font-[600] text-[#1e1e1e] text-center" data-aos="fade-up" data-aos-duration="1400">
            {{ $our_people_title->title[app()->getLocale()] }}</h1>
        <div class="mt-10 md:mt-20">
            <div class="w-full flex flex-wrap justify-center gap-10 mb-12 sm:mb-20 font-[600] px-2 overflow-hidden"
                data-aos="fade-up" data-aos-duration="1400">
                @foreach ($our_people_line1 as $item)
                    <div class="lg:w-[16%] flex flex-col items-center justify-center">
                        <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full overflow-hidden">
                            <img src="{{ asset($item->image) }}" alt="Team Member" loading="lazy"
                                class="w-full h-full object-cover" style="object-position: center top;" />

                        </div>
                        <h1 class="text-[16px] text-[#1e1e1e] mt-4">{{ $item->name[app()->getLocale()] }}</h1>
                        <p class="text-[14px] text-[#966927] w-[240px] h-[50px] text-center">
                            {{ $item->position[app()->getLocale()] }}</p>
                    </div>
                @endforeach

                @foreach ($our_people_line2 as $item)
                    <div class="lg:w-[20%] flex flex-col items-center justify-center">
                        <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full overflow-hidden">
                            <img src="{{ asset($item->image) }}" alt="Team Member" loading="lazy"
                                class="w-full h-full object-cover" style="object-position: center top;" />

                        </div>
                        <h1 class="text-[16px] text-[#1e1e1e] mt-4">{{ $item->name[app()->getLocale()] }}</h1>
                        <p class="text-[14px] text-[#966927] w-[240px] h-[50px] text-center">
                            {{ $item->position[app()->getLocale()] }}</p>
                    </div>
                @endforeach

                @foreach ($our_people_line3 as $item)
                    <div class="lg:w-[16%] flex flex-col items-center justify-center">
                        <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full overflow-hidden">
                            <img src="{{ asset($item->image) }}" alt="Team Member" loading="lazy"
                                class="w-full h-full object-cover" style="object-position: center top;" />

                        </div>
                        <h1 class="text-[16px] text-[#1e1e1e] mt-4">{{ $item->name[app()->getLocale()] }}</h1>
                        <p class="text-[14px] text-[#966927] w-[240px] h-[50px] text-center">
                            {{ $item->position[app()->getLocale()] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
        </div>
    </section>

    {{-- vision & mission --}}
    <section id="vision-mission-core" class="w-full relative bg-[#1e1e1e] px-4 md:px-10 lg:px-20">
        <div
            class="w-full max-w-7xl grid grid-cols-1 md:grid-cols-2 gap-4 relative lg:absolute top-[10px] lg:-top-[100px] left-1/2 transform -translate-x-1/2">
            <div
                class="group flex items-start justify-between gap-4 lg:gap-10 bg-[#D9D9D9] hover:bg-[linear-gradient(94deg,#FFD98B_1.01%,#966927_69.43%)] transition-all duration-300 p-4 lg:p-10">
                <div
                    class="text-[#1e1e1e] group-hover:text-white prose prose-p:text-[#1e1e1e] prose-h1:text-[#1e1e1e] prose-h2:text-[#1e1e1e] prose-h3:text-[#1e1e1e] prose-ul:text-[#1e1e1e] prose-ol:text-[#1e1e1e] prose-ul:marker:text-[#1e1e1e]
                    group-hover:prose-p:text-[#fff] group-hover:prose-h1:text-[#fff] group-hover:prose-h2:text-[#fff] group-hover:prose-h3:text-[#fff] group-hover:prose-ul:text-[#fff] group-hover:prose-ol:text-[#fff] group-hover:prose-ul:marker:text-[#fff]">
                    <h3 class="text-[25px] font-[600]">
                        {{ $visionTitle->title[app()->getLocale()] }}
                    </h3>

                    <div class="pt-2 text-justify">
                        {!! $vision->content[app()->getLocale()] !!}
                    </div>
                </div>

                <img src="{{ asset($visionTitle->icon) }}" alt=""
                    class="w-12 h-12 transition duration-300 group-hover:invert">
            </div>
            <div
                class="group flex items-start justify-between gap-4 lg:gap-10 bg-[#D9D9D9] hover:bg-[linear-gradient(94deg,#FFD98B_1.01%,#966927_69.43%)] transition-all duration-300 p-4 lg:p-10">
                <div
                    class="text-[#1e1e1e] group-hover:text-white prose prose-p:text-[#1e1e1e] prose-h1:text-[#1e1e1e] prose-h2:text-[#1e1e1e] prose-h3:text-[#1e1e1e] prose-ul:text-[#1e1e1e] prose-ol:text-[#1e1e1e] prose-ul:marker:text-[#1e1e1e]
                    group-hover:prose-p:text-[#fff] group-hover:prose-h1:text-[#fff] group-hover:prose-h2:text-[#fff] group-hover:prose-h3:text-[#fff] group-hover:prose-ul:text-[#fff] group-hover:prose-ol:text-[#fff] group-hover:prose-ul:marker:text-[#fff]">
                    <h3 class="text-[20px] md:text-[25px] font-[600]">
                        {{ $missionTitle->title[app()->getLocale()] }}
                    </h3>

                    <div class="pt-2 text-justify">
                        {!! $mission->content[app()->getLocale()] !!}
                    </div>
                </div>

                <img src="{{ asset($missionTitle->icon) }}" alt=""
                    class="w-12 h-12 transition duration-300 group-hover:invert">
            </div>

        </div>

        <div class="w-full max-w-7xl mx-auto flex flex-col pt-10 lg:pt-[22rem] min-h-[60vh] pb-10">
            <div class="w-full flex items-center justify-between">
                <h3 class="text-[20px] md:text-[25px] text-gradient font-[600]">
                    {{ $core_values_title->title[app()->getLocale()] }}
                </h3>
                <img src="{{ asset($core_values_title->icon) }}" alt="" class="w-12 h-12">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full pt-10">
                @foreach ($core_values as $item)
                    <div class="" data-aos="fade-up" data-aos-duration="1400">
                        <h1 class="text-gradient font-[600] text-[20px] md:text-[25px]">0{{ $item->order }}</h1>
                        <h3 class="text-gradient font-[600] text-[16px] md:text-[18px]">
                            {{ $item->title[app()->getLocale()] }}</h3>
                        <div
                            class="prose py-2 text-justify prose-p:text-[#fff] prose-h1:text-[#fff] prose-h2:text-[#fff] prose-h3:text-[#fff] prose-ul:text-[#fff] prose-ol:text-[#fff] prose-ul:marker:text-[#fff]">
                            {!! $item->content[app()->getLocale()] !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- certificate --}}
    <section id="{{ Str::slug(title: $brc_id->title['en']) }}" class="w-full max-w-7xl mx-auto py-5 md:py-10">
        <h1 class="text-[20px] md:text-[25px] font-[600] text-[#1e1e1e] text-center px-4">
            {{ $certificate_title->title[app()->getLocale()] }}</h1>

        <div class='w-full flex gap-4 max-w-7xl mx-auto px-4 pt-4 pb-4 md:pt-20 md:pb-10 overflow-x-auto'>
            @foreach ($certificate as $index => $item)
                <div class="flex-shrink-0 my-5" data-aos='fade-up' data-aos-duration='1200'>
                    <img src="{{ $item->image }}" alt="Certificate {{ $index + 1 }}" loading="lazy"
                        class="w-full h-[20rem] lg:h-[25rem] xl:h-[26rem] object-contain object-center" />
                </div>
            @endforeach
        </div>
    </section>

    <section id="{{ Str::slug($why_us_id->title['en']) }}" class="w-full pb-10">
        <div class="w-full max-w-7xl mx-auto">
            <h1 class="text-[20px] md:text-[25px] font-[600] text-[#1e1e1e] text-center mb-10">
                {{ $why_us_title->title[app()->getLocale()] }}</h1>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
                @foreach ($why_us as $index => $item)
                    <div class="p-4 text-[11px] xl:text-[12px] border border-gray-300 rounded-md">
                        <p class="text-end text-[30px] md:text-[50px] font-[700] text-gradient leading-none mb-4">
                            0{{ $index + 1 }}</p>
                        <h1 class="text-[14px] xl:text-[16px] font-[600] text-gradient">
                            {{ $item->title[app()->getLocale()] }}</h1>

                        <div
                            class="prose py-2 text-justify prose-p:text-[#000] prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                            {!! $item->content[app()->getLocale()] !!}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <x-banner />
    <x-footer :contact="$contact" />
@endsection
