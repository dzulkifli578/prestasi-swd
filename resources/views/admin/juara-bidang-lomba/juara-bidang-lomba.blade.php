<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juara</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/alpine.js') }}"></script>
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body>
    @include('admin.components.navbar')

    <turbo-frame id="main-content">
        @include('admin.juara-bidang-lomba.juara.juara')
        @include('admin.juara-bidang-lomba.bidang-lomba.bidang-lomba')
    </turbo-frame>

    @include('admin.components.footer')
</body>

</html>
