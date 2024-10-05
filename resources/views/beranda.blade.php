<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script src="{{ asset('js/alpine.js') }}"></script>
</head>

<body>
    @include('components.navbar')

    <turbo-frame id="main-content">
        <div class="hero min-h-screen"
            style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">Prestasi Siswa</h1>
                    <p class="mb-5">
                        SMK Swadhipa 2 Natar
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>

        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Prestasi Terbaru</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
                    <div class="flex flex-col gap-y-6 w-full">
                        <img src="https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp"
                            alt="Prestasi" class="rounded-xl">
                        <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-500">
                            <p class="text-xl lg:text-2xl font-bold">Dzulkifli Anwar</p>
                            <p class="text-lg lg:text-xl font-medium">Juara 1</p>
                            <p class="text-base lg:text-lg font-medium">LKS IT Software Solution for Business</p>
                            <div
                                class="border border-primary group-hover:border-warning-content ease-in-out duration-500">
                            </div>
                            <p class="text-base lg:text-lg font-medium">2023</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
                    <div class="flex flex-col gap-y-6 w-full">
                        <img src="https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp"
                            alt="Prestasi" class="rounded-xl">
                        <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-500">
                            <p class="text-xl lg:text-2xl font-bold">Dzulkifli Anwar</p>
                            <p class="text-lg lg:text-xl font-medium">Juara 1</p>
                            <p class="text-base lg:text-lg font-medium">LKS IT Software Solution for Business</p>
                            <div
                                class="border border-primary group-hover:border-warning-content ease-in-out duration-500">
                            </div>
                            <p class="text-base lg:text-lg font-medium">2023</p>
                        </div>
                    </div>
                </div>

                <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
                    <div class="flex flex-col gap-y-6 w-full">
                        <img src="https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp"
                            alt="Prestasi" class="rounded-xl">
                        <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-500">
                            <p class="text-xl lg:text-2xl font-bold">Dzulkifli Anwar</p>
                            <p class="text-lg lg:text-xl font-medium">Juara 1</p>
                            <p class="text-base lg:text-lg font-medium">LKS IT Software Solution for Business</p>
                            <div
                                class="border border-primary group-hover:border-warning-content ease-in-out duration-500">
                            </div>
                            <p class="text-base lg:text-lg font-medium">2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Statistik</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-base-100 rounded-xl shadow-xl p-6">
                    <div class="flex flex-row items-center gap-x-6">
                        <span class="fa-solid fa-trophy text-xl"></span>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-lg md:text-xl lg:text-2xl font-bold">Jumlah Prestasi</p>
                            <p class="text-base md:text-lg lg:text-xl font-medium">100</p>
                        </div>
                    </div>
                </div>

                <div class="bg-base-100 rounded-xl shadow-xl p-6">
                    <div class="flex flex-row items-center gap-x-6">
                        <span class="fa-solid fa-trophy text-xl"></span>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-lg md:text-xl lg:text-2xl font-bold">Jumlah Prestasi</p>
                            <p class="text-base md:text-lg lg:text-xl font-medium">100</p>
                        </div>
                    </div>
                </div>

                <div class="bg-base-100 rounded-xl shadow-xl p-6">
                    <div class="flex flex-row items-center gap-x-6">
                        <span class="fa-solid fa-trophy text-xl"></span>
                        <div class="flex flex-col gap-y-1">
                            <p class="text-lg md:text-xl lg:text-2xl font-bold">Jumlah Prestasi</p>
                            <p class="text-base md:text-lg lg:text-xl font-medium">100</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero bg-base-200 min-h-screen">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Tertarik?</h1>
                    <p class="py-6">
                        Silahkan kunjungi halaman data prestasi siswa untuk melihat lebih banyaknya
                    </p>
                    <button @click="window.location.href='{{ route('prestasi') }}'" class="btn btn-primary">Prestasi
                        Siswa</button>
                </div>
            </div>
        </div>
    </turbo-frame>

    @include('components.footer')
</body>

</html>
