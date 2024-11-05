<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Prestasi Terbaru</h1>

    @if ($prestasi->count() === 0)
        <div class="grid grid-cols-1 bg-base-100 p-6" id="prestasiGrid">
            <p class="text-center text-xl font-bold">Tidak ada data prestasi...</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="prestasiGrid">
            @foreach ($prestasi as $prestasi)
                <div class="group card-section-secondary hover-scale-down hover:bg-warning"
                    onclick="bukaDetailDataPrestasi({{ json_encode($prestasi) }})"
                    data-nama="{{ strtolower($prestasi->nama) }}" data-juara="{{ strtolower($prestasi->juara) }}"
                    data-lomba="{{ strtolower($prestasi->bidangLomba->nama) }}">
                    <div class="flex flex-col w-full">
                        @if ($prestasi->foto == null)
                            <div class="hover-shake p-6">
                                <h1 class="text-error text-center truncate">Tidak ada foto.</h1>
                            </div>
                        @else
                            <img src="{{ asset($prestasi->foto) }}" alt="Prestasi" class="rounded-xl">
                        @endif
                        <div class="flex flex-col gap-y-3 group-hover:text-warning-content tracking-wide transition-smooth">
                            <p class="text-xl lg:text-2xl font-bold mt-4 truncate">{{ $prestasi->nama }}</p>
                            <div
                                class="border border-primary my-2 group-hover:border-warning-content transition-smooth">
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-flask inline-flex text-lg text-center min-w-6 mr-4"></i>
                                <p class="text-base lg:text-lg font-semibold tracking-wide truncate">{{ $prestasi->bidangLomba->nama }}</p>
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-location-dot inline-flex text-lg text-center min-w-6 mr-4"></i>
                                <p class="text-base lg:text-lg font-semibold tracking-wide truncate">{{ $prestasi->nama_lomba }}</p>
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-trophy inline-flex text-lg text-center min-w-6 mr-4"></i>
                                <p class="text-base lg:text-lg text-center font-medium tracking-wide truncate">{{ $prestasi->juara->nama }}</p>
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-calendar inline-flex text-lg text-center min-w-6 mr-4"></i>
                                <p class="text-base lg:text-lg text-center font-medium tracking-wide truncate">{{ $prestasi->tahun }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 bg-base-100 p-6" id="noDataMessage" style="display: none;">
            <p class="text-center">Tidak ada data prestasi yang sesuai dengan pencarian...</p>
        </div>
    @endif
</div>
