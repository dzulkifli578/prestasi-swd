<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Prestasi</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body class="body-section">
    @include('peran.components.navbar')

    <turbo-frame id="main-content">
        @include('peran.admin.data-prestasi.cari-filter')

        <div class="card-section-primary transition-smooth">
            <h1 class="card-title-primary hover-scale-sm">Data Prestasi</h1>
            @include('peran.components.kondisi')
            @include('peran.admin.data-prestasi.tambah')
            @include('peran.admin.data-prestasi.tabel')
            @include('peran.admin.data-prestasi.detail')
        </div>
    </turbo-frame>

    @include('peran.components.footer')
</body>

</html>
