<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-UltraLight.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-UltraLightItalic.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-Italic.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-Medium.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-MediumItalic.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-DemiBold.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-DemiBoldItalic.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-BoldItalic.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-Heavy.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link href="{{ asset('fonts/avenir/avenir-next/AvenirNext-HeavyItalic.woff2') }}" as="font" type="font/woff2" crossorigin>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased h-full overflow-auto">
        @inertia
    </body>
</html>
