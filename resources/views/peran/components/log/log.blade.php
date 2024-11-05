<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Akun</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
</head>

<body class="body-section">
    @include('peran.components.navbar')

    <turbo-frame id="main-content">
        @include('peran.components.log.cari-filter')
        @include('peran.components.log.tabel')
    </turbo-frame>

    @include('peran.components.footer')
</body>

</html>
