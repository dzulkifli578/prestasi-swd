<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Statistik</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-col gap-y-6 group-hover:text-warning-content transition-smooth">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Jumlah Prestasi</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">{{ $jumlahPrestasi }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-col gap-y-6 group-hover:text-warning-content transition-smooth">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Jumlah Juara</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold">{{ $jumlahJuara }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-medal text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
        
        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-col gap-y-6 group-hover:text-warning-content transition-smooth">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Jumlah Bidang Lomba</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold">{{ $jumlahBidangLomba }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-crosshairs text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>
</div>
