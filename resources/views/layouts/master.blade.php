<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-new.png') }}">


    <title>Chhun Xing Group</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .text-gradient {
            background: linear-gradient(180deg, #FFD98B 0%, #966927 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .prose h1 {
            font-size: 25px;
            font-weight: bold;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            font-size: 13px;
        }

        .prose ul li::marker {
            color: #1e1e1e;
        }

        .prose ol {
            list-style-type: decimal;
            padding-left: 1.25rem;
            font-size: 13px;
        }

        .prose h2 {
            font-size: 20px;
            font-weight: bold;
        }

        .prose p {
            font-size: 13px;
        }

        .prose a {
            color: #966927;
            text-decoration: underline;
            cursor: pointer;
            font-size: 16px;
        }

        .prose a:hover {
            color: #966927;
            text-decoration: none;
            font-size: 16px;
        }

        .bg-gradient {
            background: linear-gradient(180deg, #FFD98B 0%, #966927 100%);
        }

        .bg-gradient1 {
            background: linear-gradient(94deg, #FFD98B 1.01%, #966927 69.43%);
        }

        .swiper .swiper-pagination-bullet {
            background-color: #000;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            margin: 0 5px;
        }

        .swiper .swiper-pagination .swiper-pagination-bullet-active {
            width: 10px;
            height: 4px;
            border-radius: 10px;
            background-color: #000;
        }

        @media (max-width: 639px) {
            .prose p {
                font-size: 12px;
            }
        }
    </style>

    @yield('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: 'Kantumruy Pro', sans-serif;">
    <x-scroll-top-button />
    <x-loading />
    <x-header :contact="$contact" :our_people_id="$our_people_id" :firm_id="$firm_id" :msf_id="$msf_id" :team_id="$team_id" :mvc_id="$mvc_id" :brc_id="$brc_id" :why_us_id="$why_us_id" />
    <x-navbar :firm_id="$firm_id" :our_people_id="$our_people_id" :msf_id="$msf_id" :team_id="$team_id" :mvc_id="$mvc_id" :brc_id="$brc_id" :why_us_id="$why_us_id" />

    @yield('content')

    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        var projectExperinceSwiper = new Swiper(".ProjectExperinceSwiper", {
            loop: true,
            autoplay: {
                delay: 2000,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });

        var projectSwiper = new Swiper(".ProjectSwiper", {
            loop: true,
            autoplay: {
                delay: 2000,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });

        var mainSwiper = new Swiper(".MainSwiper", {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".custom-next",
                prevEl: ".custom-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            }
        });

        var experinceSwiper = new Swiper(".ExperinceSwiper", {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".custom-next",
                prevEl: ".custom-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            }
        });

        AOS.init({
            offset: 10,
        });
    </script>
</body>

</html>
