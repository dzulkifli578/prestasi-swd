<div class="card-section-secondary">
    <div class="overflow-x-auto rounded-xl shadow-lg">
        <table class="table table-zebra">
            <thead class="bg-base-300">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Juara</th>
                    <th>Nama Lomba</th>
                    <th>Bidang Lomba</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                @if ($prestasi->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data prestasi...</td>
                    </tr>
                @else
                    @foreach ($prestasi as $prestasi)
                        <tr class="cursor-pointer"
                            onclick="bukaDetailDataPrestasi({{ json_encode($prestasi) }})">
                            <th>{{ $prestasi->id }}</th>
                            <td>{{ $prestasi->nama }}</td>
                            <td>{{ $prestasi->juara->nama }}</td>
                            <td>{{ $prestasi->nama_lomba }}</td>
                            <td>{{ $prestasi->bidangLomba->nama }}</td>
                            <td>{{ $prestasi->tahun }}</td>
                        </tr>
                    @endforeach
                    <tr id="noDataRow" style="display: none">
                        <td colspan="6" class="text-center">Tidak ada data prestasi yang sesuai dengan pencarian...
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const juaraFilter = document.getElementById('juaraFilter');
    const bidangLombaFilter = document.getElementById('bidangLombaFilter');
    const tableRows = document.querySelectorAll('tbody tr:not(#noDataRow)')
    const noDataRow = document.getElementById('noDataRow');

    function filterData() {
        const tableRows = document.querySelectorAll('tbody tr:not(#noDataRow)');
        const searchValue = searchInput.value.toLowerCase();
        const selectedJuara = juaraFilter.value.toLowerCase();
        const selectedBidangLomba = bidangLombaFilter.value.toLowerCase();

        let rowVisible = false;

        tableRows.forEach(row => {
            const id = row.cells[0].textContent.toLowerCase();
            const nama = row.cells[1].textContent.toLowerCase();
            const juara = row.cells[2].textContent.toLowerCase();
            const namaLomba = row.cells[3].textContent.toLowerCase();
            const bidangLomba = row.cells[4].textContent.toLowerCase();

            const isIdMatch = id.includes(searchValue);
            const isNamaMatch = nama.includes(searchValue) || namaLomba.includes(searchValue);
            const isJuaraMatch = !selectedJuara || juara.includes(selectedJuara);
            const isBidangLombaMatch = !selectedBidangLomba || bidangLomba.includes(selectedBidangLomba);

            if ((isIdMatch || isNamaMatch) && isJuaraMatch && isBidangLombaMatch) {
                row.style.display = '';
                rowVisible = true;
            } else
                row.style.display = 'none';
        });

        noDataRow.style.display = rowVisible ? 'none' : '';
    }

    searchInput.addEventListener('input', filterData);
    juaraFilter.addEventListener('change', filterData);
    bidangLombaFilter.addEventListener('change', filterData);
</script>
