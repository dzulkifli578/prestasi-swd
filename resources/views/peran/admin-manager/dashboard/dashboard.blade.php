<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Admin Manager</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body class="section-body">
    @include('peran.components.navbar')

    <turbo-frame id="main-content">
        @include('peran.admin-manager.dashboard.statistik')
        @include('peran.admin-manager.dashboard.tabel')
    </turbo-frame>

    @include('peran.components.footer')
</body>

</html>
