<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prestasi</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script src="{{ asset('js/alpine.js') }}" defer></script>
</head>

<body>
    @include('components.navbar')

    <turbo-frame id="main-content">
        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Cari & Filter</h1>
            @include('data-prestasi.cari-filter')
        </div>

        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Data Prestasi Siswa</h1>
            @include('data-prestasi.grid')
            @include('data-prestasi.detail')
        </div>
    </turbo-frame>

    @include('components.footer')
</body>

</html>
