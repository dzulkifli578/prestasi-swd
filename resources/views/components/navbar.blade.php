@php
    use Carbon\Carbon;

    $currentHour = Carbon::now()->format('H');
    if ($currentHour >= 5 && $currentHour < 12) {
        $greeting = 'Selamat Pagi';
    } elseif ($currentHour >= 12 && $currentHour < 15) {
        $greeting = 'Selamat Siang';
    } elseif ($currentHour >= 15 && $currentHour < 18) {
        $greeting = 'Selamat Sore';
    } else {
        $greeting = 'Selamat Malam';
    }
@endphp

@php
    $menu = [
        ['route' => 'beranda', 'label' => 'Beranda', 'icon' => 'fa-solid fa-house'],
        ['route' => 'prestasi', 'label' => 'Data Prestasi', 'icon' => 'fa-solid fa-list'],
        ['route' => 'tentang', 'label' => 'Tentang', 'icon' => 'fa-solid fa-info'],
        ['route' => 'login', 'label' => 'Login', 'icon' => 'fa-solid fa-right-to-bracket'],
    ];
@endphp

<div class="fixed top-0 navbar bg-base-100 border-b border-neutral-content z-10">
    <div class="navbar-start">
        <a class="navbar-text ml-6 truncate cursor-default">SMK Swadhipa 2 Natar</a>
    </div>
    <div class="navbar-end">
        <label for="my-drawer" class="cursor-pointer mr-6">
            <img src="{{ asset('img/swadhipa.avif') }}" alt="Logo Swadhipa" class="h-12 hover-scale-sm">
        </label>
    </div>
</div>

<div class="drawer drawer-end z-20">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-300 text-base-content min-h-full w-60 p-6">
            <div class="w-full flex flex-col justify-center">
                <p class="text-lg md:text-xl lg:text-2xl font-semibold">{{ $greeting }}</p>
                <div class="border border-primary my-4"></div>
            </div>
            <div class="text-lg">
                @foreach ($menu as $menu)
                    <li><a href="{{ route($menu['route']) }}"
                            class="{{ Route::is($menu['route']) ? 'text-primary' : '' }}">
                            <i class="{{ $menu['icon'] }} inline-flex text-center min-w-6 mr-2"></i> {{ $menu['label'] }}</a>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>
</div>
