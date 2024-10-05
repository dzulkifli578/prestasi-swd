<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prestasi</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script src="{{ asset('js/alpine.js') }}"></script>
</head>

<body>
    @include('components.navbar')

    <turbo-frame id="main-content">
        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Cari & Filter</h1>

            <div class="bg-base-100 rounded-xl shadow-xl p-6">
                <div class="flex flex-col gap-y-6">
                    <input type="text" placeholder="Cari berdasarkan nama."
                        class="input input-bordered input-primary w-full" />
                    <div class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 lg:gap-x-6">
                        <select class="select select-bordered select-primary w-full">
                            <option disabled selected>Juara</option>
                            <option>Han Solo</option>
                            <option>Greedo</option>
                        </select>
                        <select class="select select-bordered select-primary w-full">
                            <option disabled selected>Lomba</option>
                            <option>Han Solo</option>
                            <option>Greedo</option>
                        </select>
                        <select class="select select-bordered select-primary w-full">
                            <option disabled selected>Tahun</option>
                            <option>Han Solo</option>
                            <option>Greedo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Data Prestasi Siswa</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
    </turbo-frame>

    @include('components.footer')
</body>

</html>
