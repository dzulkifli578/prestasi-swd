@php
    $menu = [
        ['route' => 'beranda', 'label' => 'Beranda'],
        ['route' => 'prestasi', 'label' => 'Prestasi'],
        ['route' => 'login', 'label' => 'Login'],
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

<!-- Drawer -->
<div class="drawer z-10">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-300 text-base-content min-h-full w-52 p-6">
            <div class="w-full flex flex-col justify-center">
                <p class="text-lg md:text-xl lg:text-2xl font-semibold">Halo</p>
                <div class="border border-primary my-4"></div>
            </div>
            <div class="text-lg md:text-xl lg:text-2xl">
                @foreach ($menu as $item)
                    <li><a href="{{ route($item['route']) }}"
                            class="{{ Route::is($item['route']) ? 'text-primary' : '' }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>
</div>
