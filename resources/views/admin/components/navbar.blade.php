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
        ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'fa-solid fa-house'],
        ['route' => 'profil', 'label' => 'Profil', 'icon' => 'fa-solid fa-user'],
        ['route' => 'data-prestasi', 'label' => 'Data Prestasi', 'icon' => 'fa-solid fa-list'],
        ['route' => 'juara-bidang-lomba', 'label' => 'Juara & Bidang Lomba', 'icon' => 'fa-solid fa-list'],
        ['route' => 'log', 'label' => 'Log', 'icon' => 'fa-solid fa-list'],
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
    <div class="navbar-end">
        <div class="avatar online">
            <div class="w-12 h-12 rounded-full">
                <label for="my-drawer" class="flex flex-row items-center cursor-pointer gap-x-4">
                    <img src="{{ asset(session('foto')) }} " alt="Profil" />
                </label>
            </div>
        </div>
    </div>
</div>

<div class="drawer z-10">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-300 text-base-content min-h-full w-72 p-6">
            <div class="w-full flex flex-col justify-center">
                <p class="text-lg md:text-xl lg:text-2xl font-semibold">{{ $greeting }},
                    {{ session('nama_pengguna') }}</p>
                <div class="border border-primary my-4"></div>
            </div>
            <div class="text-lg">
                @foreach ($menu as $item)
                    <li class="flex flex-row items-center"><a href="{{ route($item['route']) }}"
                            class="{{ Route::is($item['route']) ? 'text-primary' : '' }}"><i
                                class="{{ $item['icon'] }}"></i> {{ $item['label'] }}</a>
                    </li>
                @endforeach
                <li class="flex flex-row items-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                    </form>
                </li>
            </div>
        </ul>
    </div>
</div>
