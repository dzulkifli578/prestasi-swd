@php
    $gambar = [
        'https://raw.githubusercontent.com/laravel/art/d5f5e725c27f877ed032225fe0b00afee9337d0f/logo-lockup/5%20SVG/3%20rgb/1%20Full%20Color/laravel-logolockup-rgb-red.svg',
        'https://tailwindcss.com/_next/static/media/tailwindcss-logotype-white.944c5d0ef628083bb316f9b3d643385c86bcdb3d.svg',
        'https://img.daisyui.com/images/daisyui-logo/daisyui-logotype.svg',
    ];
@endphp

<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Teknologi yang Digunakan</h1>
    <div class="border border-primary my-6"></div>

    <div class="grid grid-cols-1 md:grid-cols-3 justify-center items-center gap-6">
        @foreach ($gambar as $gambar)
            <div class="bg-base-100 hover:ring-2 hover:ring-primary ease-in-out duration-300 rounded-xl shadow-lg p-6">
                <img src="{{ $gambar }}" alt="Prestasi" class="object-contain">
            </div>
        @endforeach
    </div>
</div>
