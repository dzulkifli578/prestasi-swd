<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
        <div class="flex flex-row items-center gap-x-6">
            <span class="fa-solid fa-trophy text-xl group-hover:text-warning-content ease-in-out duration-500"></span>
            <div class="flex flex-col gap-y-1 group-hover:text-warning-content ease-in-out duration-500">
                <p class="text-lg md:text-xl lg:text-2xl font-bold">Jumlah Prestasi</p>
                <p class="text-base md:text-lg lg:text-xl font-medium">{{ $jumlahPrestasi }}</p>
            </div>
        </div>
    </div>

    <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
        <div class="flex flex-row items-center gap-x-6">
            <span class="fa-solid fa-trophy text-xl group-hover:text-warning-content ease-in-out duration-500"></span>
            <div class="flex flex-col gap-y-1 group-hover:text-warning-content ease-in-out duration-500">
                <p class="text-lg md:text-xl lg:text-2xl font-bold">Jumlah Juara</p>
                <p class="text-base md:text-lg lg:text-xl font-medium">{{ $jumlahJuara }}</p>
            </div>
        </div>
    </div>

    <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
        <div class="flex flex-row items-center gap-x-6">
            <span class="fa-solid fa-trophy text-xl group-hover:text-warning-content ease-in-out duration-500"></span>
            <div class="flex flex-col gap-y-1 group-hover:text-warning-content ease-in-out duration-500">
                <p class="text-lg md:text-xl lg:text-2xl font-bold">Jumlah Bidang Lomba</p>
                <p class="text-base md:text-lg lg:text-xl font-medium">{{ $jumlahBidangLomba }}</p>
            </div>
        </div>
    </div>
</div>
