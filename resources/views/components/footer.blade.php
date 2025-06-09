@props(['contact'])
<div class="w-full max-w-6xl mx-auto px-2 md:px-10">
    <div class="bg-[#1E1E1E] w-full max-w-6xl mx-auto h-[2rem]"></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 py-10 px-4">
        <div class="flex flex-col col-span-1 sm:col-span-2 space-y-1 text-[12px]">
            <h1 class="text-[18px] text-gradient font-[600] mb-4">{{ __('messages.CHHUN XING CITY') }}</h1>
            <p class="text-justify">{{ __('messages.footer_text') }}</p>
        </div>
        <div class="flex flex-col space-y-1 text-[12px] ml-0 lg:ml-4">
            <h1 class="text-[18px] text-gradient font-[600] mb-4">Information</h1>
            <ul class="flex flex-col">
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
                    <a href="{{ route('real-estate-project') }}" class="">
                        {{ __('messages.Real Estate Project') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('residence-project') }}" class="">
                        {{ __('messages.Project References') }}
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
            <h1 class="text-[18px] text-gradient font-[600] mb-4">Keep In Touch</h1>
            <p>{{ $contact->location[app()->getLocale()] }}</p>
            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            <span><a href="tel:{{ $contact->phone_number1 }}">{{ $contact->phone_number1 }}</a> / <a href="tel:{{ $contact->phone_number2 }}">{{ $contact->phone_number2 }}</a> </span>
        </div>
        <div class="flex flex-col space-y-1 text-[12px]">
            <h1 class="text-[18px] text-gradient font-[600] mb-4">Follow</h1>

            <div class="flex space-x-2 items-center">
                <a href="{{ $contact->facebook }}">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M36 18.1262C36 26.9948 29.5023 34.3455 21.0085 35.6781V23.2622H25.1485L25.9362 18.1262H21.0085V14.7933C21.0085 13.3879 21.697 12.0185 23.904 12.0185H26.1444V7.64596C26.1444 7.64596 24.1109 7.29893 22.1668 7.29893C18.1087 7.29893 15.456 9.75866 15.456 14.2117V18.1262H10.9447V23.2622H15.456V35.6781C6.9622 34.3455 0.464478 26.9948 0.464478 18.1262C0.464478 8.31364 8.41972 0.358398 18.2322 0.358398C28.0448 0.358398 36 8.31364 36 18.1262Z"
                            fill="#1E1E1E" />
                        <path
                            d="M25.1486 23.2622L25.9364 18.1262H21.0086V14.7933C21.0086 13.3882 21.697 12.0185 23.9041 12.0185H26.1446V7.64598C26.1446 7.64598 24.1113 7.29895 22.1673 7.29895C18.1088 7.29895 15.4562 9.75867 15.4562 14.2117V18.1262H10.9448V23.2622H15.4562V35.678C16.3608 35.82 17.2879 35.8939 18.2324 35.8939C19.1769 35.8939 20.104 35.82 21.0086 35.678V23.2622H25.1486Z"
                            fill="white" />
                    </svg>
                </a>
                <a href="{{ $contact->telegram }}">
                    <svg width="37" height="36" viewBox="0 0 37 36" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.2438 35.8939C28.059 35.8939 36.0116 27.9414 36.0116 18.1262C36.0116 8.31095 28.059 0.358398 18.2438 0.358398C8.42863 0.358398 0.476074 8.31095 0.476074 18.1262C0.476074 27.9414 8.42863 35.8939 18.2438 35.8939ZM8.60631 17.7412L25.7374 11.136C26.5325 10.8488 27.2269 11.33 26.9693 12.5323L26.9708 12.5308L24.0539 26.2727C23.8377 27.2469 23.2588 27.4839 22.4489 27.0249L18.0069 23.7511L15.8644 25.8152C15.6275 26.0521 15.4276 26.252 14.9686 26.252L15.284 21.7315L23.5164 14.2942C23.8747 13.9789 23.4365 13.8012 22.9641 14.1151L12.7906 20.5204L8.40494 19.1523C7.45288 18.8502 7.43215 18.2002 8.60631 17.7412Z"
                            fill="#1E1E1E" />
                    </svg>

                </a>
            </div>
        </div>
    </div>
    <div class="bg-gradient1 w-full max-w-6xl mx-auto h-[2rem] flex items-center justify-center">
        <p class="text-[14px] text-[#1e1e1e]">All Right Reserved 2025</p>
    </div>

</div>
