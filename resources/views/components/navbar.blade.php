@props(['firm_id', 'msf_id', 'team_id', 'mvc_id', 'brc_id', 'why_us_id', 'our_people_id'])

<style>
    .nav_link {
        background-color: transparent;
        color: #fff;
        position: relative;
    }

    .nav_link.active {
        background: linear-gradient(180deg, #FFD98B 0%, #966927 100%);
        color: #1e1e1e;
        font-weight: 500;
    }

    .nav_link::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 0;
        bottom: 0;
        left: 0;
        background: linear-gradient(180deg, #FFD98B 0%, #966927 100%);
        transition: height 0.3s ease;
        z-index: -1;
    }

    .nav_link:hover::after {
        height: 100%;
    }

    .nav_link:hover {
        color: #1e1e1e;
    }

    .bg-color {
        background: linear-gradient(180deg, #FFD98B 0%, #966927 100%);
    }
</style>

<div
    class="absolute bg-[#000]/50 z-10 w-full max-w-7xl top-0 left-1/2 -translate-x-1/2 h-[4rem] mt-[7rem] hidden lg:flex items-center justify-center">
    <ul class="flex items-center justify-center gap-6 text-[18px]">
        <li>
            <a href="{{ route('home') }}"
                class="pt-[37px] pb-[21.5px] px-4 nav_link text-white {{ Request::routeIs('home') ? 'active' : '' }}">
                {{ __('messages.Home') }}
            </a>
        </li>
        <li class="relative group">
            <a href="{{ route('about-us') }}"
                class="pt-[37px] pb-[21.5px] px-4 nav_link text-white {{ Request::routeIs('about-us') ? 'active' : '' }}">
                {{ __('messages.About Us') }}
            </a>
            <!-- Dropdown menu -->
            <ul
                class="absolute left-0 top-full mt-[18px] py-2 hidden group-hover:block bg-color text-[#1e1e1e] min-w-[340px] z-50 text-[16px]">
                <li>
                    <a href="{{ route('about-us') }}#{{ Str::slug($firm_id->title['en']) }}"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ $firm_id->title[app()->getLocale()] }}</a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}#{{ Str::slug($msf_id->title['en']) }}"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ $msf_id->title[app()->getLocale()] }}</a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}#{{ Str::slug($team_id->title['en']) }}"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ $team_id->title[app()->getLocale()] }}</a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}#{{ Str::slug($our_people_id->title['en']) }}"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ $our_people_id->title[app()->getLocale()] }}</a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}#vision-mission-core"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">
                        @foreach ($mvc_id as $item)
                            {{ $item->title[app()->getLocale()] }}
                        @endforeach
                    </a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}#{{ Str::slug($brc_id->title['en']) }}"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ $brc_id->title[app()->getLocale()] }}</a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}#{{ Str::slug($why_us_id->title['en']) }}"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ $why_us_id->title[app()->getLocale()] }}</a>
                </li>
            </ul>
        </li>
        <li class="relative group">
            <a href="{{ route('residence-project') }}"
                class="pt-[37px] pb-[21.5px] px-4 nav_link text-white {{ Request::routeIs('residence-project') ? 'active' : '' }}">
                {{ __('messages.Our Services') }}
            </a>
            <ul
                class="absolute left-0 top-full mt-[18px] py-2 hidden group-hover:block bg-color text-[#1e1e1e] min-w-[340px] z-50 text-[16px]">
                <li>
                    <a href="{{ route('residence-project') }}#project-reference"
                        class="block px-4 py-2 hover:bg-[#1e1e1e] hover:text-white">{{ __('messages.Project References') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('real-estate-project') }}"
                class="pt-[37px] pb-[21.5px] px-4 nav_link text-white {{ Request::routeIs('real-estate-project') ? 'active' : '' }}">
                {{ __('messages.Real Estate Project') }}
            </a>
        </li>
        <li>
            <a href="{{ route('contact-us') }}"
                class="pt-[37px] pb-[21.5px] px-4 nav_link text-white {{ Request::routeIs('contact-us') ? 'active' : '' }}">
                {{ __('messages.Contact') }}
            </a>
        </li>
    </ul>
</div>
