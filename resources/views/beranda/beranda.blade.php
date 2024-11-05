<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body class="body-section">
    @include('components.navbar')

    <turbo-frame id="main-content">
        @include('beranda.hero-1')
        @include('beranda.prestasi')
        @include('beranda.statistik')
        @include('beranda.hero-2')
        @include('beranda.detail')
    </turbo-frame>

    @include('components.footer')
</body>

</html>
