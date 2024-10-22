@if ($prestasi->isEmpty())
    <div class="grid grid-cols-1" id="prestasiGrid">
        <p class="text-center text-xl font-bold">Tidak ada data prestasi...</p>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="prestasiGrid">
        @foreach ($prestasi as $itemPrestasi)
            <div class="prestasi-item group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6" onclick="bukaDetailDataPrestasi({{ json_encode ($itemPrestasi) }})"
                data-nama="{{ strtolower($itemPrestasi->nama) }}" data-juara="{{ strtolower($itemPrestasi->juara) }}"
                data-lomba="{{ strtolower($itemPrestasi->nama_lomba) }}" data-waktu="{{ $itemPrestasi->tahun }}">
                <div class="flex flex-col gap-y-6 w-full">
                    <img src="{{ asset($itemPrestasi->foto) }}" alt="Prestasi" class="rounded-xl">
                    <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-500">
                        <p class="text-xl lg:text-2xl font-bold">{{ $itemPrestasi->nama }}</p>
                        <p class="text-lg lg:text-xl font-medium">{{ $itemPrestasi->juara }}</p>
                        <p class="text-base lg:text-lg font-medium">{{ $itemPrestasi->nama_lomba }}</p>
                        <div class="border border-primary group-hover:border-warning-content ease-in-out duration-500">
                        </div>
                        <p class="text-base lg:text-lg font-medium">{{ $itemPrestasi->tahun }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1" id="noDataMessage" style="display: none;">
        <p class="text-center">Tidak ada data prestasi yang sesuai dengan pencarian...</p>
    </div>
@endif

<script>
    const searchInput = document.getElementById('searchInput');
    const juaraFilter = document.getElementById('juaraFilter');
    const lombaFilter = document.getElementById('lombaFilter');
    const waktuFilter = document.getElementById('waktuFilter');
    const prestasiItems = document.querySelectorAll('.prestasi-item');
    const noDataMessage = document.getElementById('noDataMessage');

    function filterPrestasi() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedJuara = juaraFilter.value.toLowerCase();
        const selectedLomba = lombaFilter.value.toLowerCase();
        const selectedWaktu = waktuFilter.value;
        let visibleItems = 0;

        const prestasiItemsArray = Array.from(prestasiItems);

        if (selectedWaktu === "terbaru")
            prestasiItemsArray.sort((a, b) => parseInt(b.dataset.waktu) - parseInt(a.dataset.waktu));
        else if (selectedWaktu === "terlama")
            prestasiItemsArray.sort((a, b) => parseInt(a.dataset.waktu) - parseInt(b.dataset.waktu));

        prestasiItemsArray.forEach(item => {
            const nama = item.dataset.nama;
            const juara = item.dataset.juara;
            const lomba = item.dataset.lomba;
            const waktu = item.dataset.waktu;

            const isNamaMatch = nama.includes(searchValue);
            const isJuaraMatch = selectedJuara === "" || juara.includes(selectedJuara);
            const isLombaMatch = selectedLomba === "" || lomba.includes(selectedLomba);

            const isWaktuMatch = selectedWaktu === "" || true;

            if (isNamaMatch && isJuaraMatch && isLombaMatch && isWaktuMatch) {
                item.style.display = '';
                visibleItems++;
            } else
                item.style.display = 'none';
        });

        if (visibleItems === 0)
            noDataMessage.style.display = 'block';
        else
            noDataMessage.style.display = 'none';
    }


    searchInput.addEventListener('input', filterPrestasi);
    juaraFilter.addEventListener('change', filterPrestasi);
    lombaFilter.addEventListener('change', filterPrestasi);
    waktuFilter.addEventListener('change', filterPrestasi);

    filterPrestasi();
</script>
