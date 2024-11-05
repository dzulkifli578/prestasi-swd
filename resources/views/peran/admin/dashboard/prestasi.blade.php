<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Prestasi Terbaru</h1>

    @if ($prestasi->isEmpty())
        <div class="grid grid-cols-1">
            <div class="group bg-base-100 hover:bg-warning ease-in-out duration-300 rounded-xl shadow-lg p-6">
                <p class="text-center group-hover:text-warning-content ease-in-out duration-300">Tidak ada
                    data prestasi...</p>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="prestasiGrid">
            @foreach ($prestasi as $prestasi)
                <div class="prestasi-item group bg-base-100 hover:bg-warning hover:scale-95 ease-in-out duration-300 rounded-xl shadow-lg p-6"
                    onclick="bukaDetailDataPrestasi({{ json_encode($prestasi) }})"
                    data-nama="{{ strtolower($prestasi->nama) }}" data-juara="{{ strtolower($prestasi->juara->nama) }}"
                    data-lomba="{{ strtolower($prestasi->bidangLomba->nama) }}">
                    <div class="flex flex-col w-full">
                        @if ($prestasi->foto == null)
                            <div class="bg-base-300 rounded-xl shadow-md hover:animate-shake transition-transform p-6">
                                <h1 class="text-error text-center">Tidak ada foto.</h1>
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
    @endif
</div>
