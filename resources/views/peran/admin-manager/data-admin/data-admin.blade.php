<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Admin</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body class="body-section">
    @include('peran.components.navbar')

    <turbo-frame id="main-content">
        @include('peran.admin-manager.data-admin.cari-filter')

        <div class="card-section-primary transition-smooth">
            <h1 class="card-title-primary hover-scale-sm">Data Admin</h1>
            @include('peran.components.kondisi')
            @include('peran.admin-manager.data-admin.tambah')
            @include('peran.admin-manager.data-admin.tabel')
            @include('peran.admin-manager.data-admin.detail')
        </div>
    </turbo-frame>

    @include('peran.components.footer')
</body>

</html>
