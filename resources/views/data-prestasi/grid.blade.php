<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Data Prestasi Siswa</h1>

    @if ($prestasi->isEmpty())
        <div class="grid grid-cols-1 bg-base-100 p-6" id="prestasiGrid">
            <p class="text-center text-xl font-bold">Tidak ada data prestasi...</p>
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
                        <div class="flex flex-col gap-y-3 group-hover:text-warning-content ease-in-out duration-300">
                            <p class="text-xl lg:text-2xl font-bold mt-4">{{ $prestasi->nama }}</p>
                            <div
                                class="border border-primary group-hover:border-warning-content ease-in-out duration-300 my-2">
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-flask inline-flex text-lg text-center w-6 mr-4"></i>
                                <p class="text-lg lg:text-xl font-semibold">{{ $prestasi->bidangLomba->nama }}</p>
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-location-dot inline-flex text-lg text-center w-6 mr-4"></i>
                                <p class="text-base lg:text-lg font-semibold">{{ $prestasi->nama_lomba }}</p>
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-trophy inline-flex text-lg text-center w-6 mr-4"></i>
                                <p class="text-base lg:text-lg text-center font-medium">{{ $prestasi->juara->nama }}</p>
                            </div>
                            <div class="flex flex-row items-center">
                                <i class="fa-solid fa-calendar inline-flex text-lg text-center w-6 mr-4"></i>
                                <p class="text-base lg:text-lg text-center font-medium">{{ $prestasi->tahun }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 card-section-secondary" id="noDataMessage" style="display: none;">
            <p class="text-center">Tidak ada data prestasi yang sesuai dengan pencarian...</p>
        </div>
    @endif
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const juaraFilter = document.getElementById('juaraFilter');
    const lombaFilter = document.getElementById('lombaFilter');
    const prestasiItems = document.querySelectorAll('.prestasi-item');
    const noDataMessage = document.getElementById('noDataMessage');

    function filterPrestasi() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedJuara = juaraFilter.value.toLowerCase();
        const selectedLomba = lombaFilter.value.toLowerCase();
        let visibleItems = 0;

        prestasiItems.forEach(item => {
            const nama = item.dataset.nama || "";
            const juara = item.dataset.juara || "";
            const lomba = item.dataset.lomba || "";

            const isSearchMatch = !searchValue || nama.includes(searchValue);
            const isJuaraMatch = !selectedJuara || juara === selectedJuara;
            const isLombaMatch = !selectedLomba || lomba === selectedLomba;

            if (isSearchMatch && isJuaraMatch && isLombaMatch) {
                item.style.display = '';
                visibleItems++;
            } else
                item.style.display = 'none';
        });

        noDataMessage.style.display = visibleItems === 0 ? 'block' : 'none';
    }


    searchInput.addEventListener('input', filterPrestasi);
    juaraFilter.addEventListener('change', filterPrestasi);
    lombaFilter.addEventListener('change', filterPrestasi);

    filterPrestasi();
</script>
