<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yelema - Acceuil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js" integrity="sha512-jEnuDt6jfecCjthQAJ+ed0MTVA++5ZKmlUcmDGBv2vUI/REn6FuIdixLNnQT+vKusE2hhTk2is3cFvv5wA+Sgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://unpkg.com/htmx.org@2.0.1"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12/dist/ext/sse.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('style')

</head>
<body class="bg-orange-50">
    @include('front.parts.topbar')
    <div class="absolute -z-50 text-center">
        <img src="/assets/img/home-background.png" class="-z-50 h-[80vh] w-[100vw]"  alt="">
    </div>
    <div class="absolute opacity-50 -z-50">
        <svg width="1440" height="500" viewBox="0 0 1440 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_f_39_93)">
                <circle cx="720" cy="506" r="513" fill="#F6C289" fill-opacity="0.5"/>
            </g>
            <defs>
                <filter id="filter0_f_39_93" x="-593" y="-807" width="2626" height="2626" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feGaussianBlur stdDeviation="400" result="effect1_foregroundBlur_39_93"/>
                </filter>
            </defs>
        </svg>
    </div>
    <div class="z-50">
        @yield('content')
    </div>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        @if(session()->has('get_pdf'))
            console.log("get_pdf");
            // download pdf
            window.location.href = "/download-facture/{{ session()->get('commande_id') }}";
            @php
                session()->forget('get_pdf');
            @endphp

        @endif

        @if(session()->has('success'))
            Swal.fire("{{ session()->get('success') }}");
            @php
                session()->forget('success');
            @endphp
        @endif
    </script>
    @stack('script')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>
