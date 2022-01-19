<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @isset($title) {{ $title }} @endisset | Toko Inez</title>

    @isset($meta)
        {{ $meta }}
    @endisset

    <!-- Styles -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@400;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- favicon --}}
    <link rel="shortcut icon" href="/images/favicon.jpeg" type="image/x-icon">

    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css"
        media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css"
        media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

    <livewire:styles />
    {{-- Script --}}

    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/vendor.js') }}" defer></script> --}}
    <script src="{{ asset('js/vendor~utils-1.js') }}" defer></script>
    <script src="{{ asset('js/manifest.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</head>

<body class="antialiased">
    @include('customer.components.navbar')


    <!-- Main Content -->
    <div class="main-content">
        {{ $slot }}
    </div>
    @include('customer.components.footer')

    @stack('js')

    @stack('modals')




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <livewire:scripts />
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/vendor.js') }}" defer></script> --}}
    <script src="{{ asset('js/vendor~utils-1.js') }}" defer></script>
    <script src="{{ asset('js/manifest.js') }}" defer></script>

    @isset($script)
        {{ $script }}
    @endisset
</body>

</html>
