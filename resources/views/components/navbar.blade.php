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
        ['route' => 'prestasi', 'label' => 'Prestasi', 'icon' => 'fa-solid fa-list'],
        ['route' => 'tentang', 'label' => 'Tentang', 'icon' => 'fa-solid fa-info'],
        ['route' => 'login', 'label' => 'Login', 'icon' => 'fa-solid fa-right-to-bracket'],
    ];
@endphp

<div class="navbar bg-base-100 border-b border-neutral-content">
    <div class="navbar-start">
        <div class="drawer-content">
            <label for="my-drawer" class="flex flex-row items-center cursor-pointer gap-x-4">
                <img src="{{ asset('img/swadhipa.png') }}" alt="Logo Swadhipa" class="h-12">
                <a class="text-xl xl:text-2xl text-nowrap font-semibold">SMK Swadhipa 2 Natar</a>
            </label>
        </div>
    </div>
</div>

<div class="drawer z-10">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-300 text-base-content min-h-full w-52 p-6">
            <div class="w-full flex flex-col justify-center">
                <p class="text-lg md:text-xl lg:text-2xl font-semibold">{{ $greeting }}</p>
                <div class="border border-primary my-4"></div>
            </div>
            <div class="text-lg">
                @foreach ($menu as $menu)
                    <li><a href="{{ route($menu['route']) }}"
                            class="{{ Route::is($menu['route']) ? 'text-primary' : '' }}"><i
                                class="{{ $menu['icon'] }}"></i> {{ $menu['label'] }}</a>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>
</div>
