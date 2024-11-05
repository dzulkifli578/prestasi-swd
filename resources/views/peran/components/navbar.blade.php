@php
    use Carbon\Carbon;

    $currentHour = Carbon::now()->format('H');
        if ($currentHour >= 5 && $currentHour < 12)
            $greeting = 'Selamat Pagi';
        elseif ($currentHour >= 12 && $currentHour < 15)
            $greeting = 'Selamat Siang';
        elseif ($currentHour >= 15 && $currentHour < 18)
            $greeting = 'Selamat Sore';
        else
            $greeting = 'Selamat Malam';

        if (session('peran') == 'admin') {
            $menu = [
                ['route' => 'dashboard-admin', 'label' => 'Dashboard', 'icon' => 'fa-solid fa-house'],
                ['route' => 'profil-admin', 'label' => 'Profil', 'icon' => 'fa-solid fa-user'],
                ['route' => 'data-prestasi', 'label' => 'Data Prestasi', 'icon' => 'fa-solid fa-list'],
                ['route' => 'juara-bidang-lomba', 'label' => 'Juara & Bidang Lomba', 'icon' => 'fa-solid fa-list'],
                ['route' => 'log-admin', 'label' => 'Log', 'icon' => 'fa-solid fa-list'],
            ];
            $logout = 'logout-admin';
        } else if (session('peran') == 'admin-manager') {
            $menu = [
                ['route' => 'dashboard-admin-manager', 'label' => 'Dashboard', 'icon' => 'fa-solid fa-house'],
                ['route' => 'profil-admin-manager', 'label' => 'Profil', 'icon' => 'fa-solid fa-user'],
                ['route' => 'data-admin', 'label' => 'Data Admin', 'icon' => 'fa-solid fa-list'],
                ['route' => 'log-admin-manager', 'label' => 'Log', 'icon' => 'fa-solid fa-list'],
            ];
            $logout = 'logout-admin-manager';
        }
@endphp

<div class="fixed top-0 navbar bg-base-100 border-b border-neutral-content z-10">
    <div class="navbar-start">
        <div class="flex flex-row items-center ml-4 gap-x-4">
            <img src="{{ asset('img/swadhipa.avif') }}" alt="Logo Swadhipa" class="h-12">
            <a class="navbar-text truncate cursor-default">SMK Swadhipa 2 Natar</a>
        </div>
    </div>
    <div class="navbar-end">
        <label for="my-drawer" class="flex mr-6">
            <div class="avatar online">
                <div class="w-12 h-12 rounded-full cursor-pointer hover-scale-sm">
                    <img src="{{ asset(session('foto')) }} " alt="Profil" />
                </div>
            </div>
        </label>
    </div>
</div>

<div class="drawer drawer-end z-20">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-300 text-base-content min-h-full w-80 p-6">
            <div class="w-full flex flex-col justify-center">
                <p class="text-lg md:text-xl lg:text-2xl font-semibold">{{ $greeting }},
                    {{ session('nama_pengguna') }}</p>
                <div class="border border-primary my-4"></div>
            </div>
            <div class="text-lg">
                @foreach ($menu as $menu)
                    <li><a href="{{ route($menu['route']) }}"
                            class="{{ Route::is($menu['route']) ? 'text-primary' : '' }}">
                            <i class="{{ $menu['icon'] }} inline-flex text-center w-6 mr-2"></i> {{ $menu['label'] }}</a>
                    </li>
                @endforeach
                <li class="flex flex-row items-center">
                    <form action="{{ route($logout) }}" method="POST">
                        @csrf
                        <button type="submit"><i class="fa-solid fa-right-from-bracket inline-flex text-center w-8"></i> Logout</button>
                    </form>
                </li>
            </div>
        </ul>
    </div>
</div>
