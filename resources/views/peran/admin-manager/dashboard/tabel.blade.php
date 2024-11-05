<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Data Admin</h1>

    <div class="bg-base-100 rounded-xl shadow-lg p-6">
        <div class="overflow-x-auto rounded-xl shadow-lg">
            <table class="table table-zebra">
                <thead class="bg-base-300">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Peran</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($akun->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data admin...</td>
                        </tr>
                    @else
                        @foreach ($akun as $akun)
                            <tr class="cursor-pointer"
                                onclick="bukaDetailDataPrestasi({{ json_encode($akun) }})">
                                <th>{{ $akun->id }}</th>
                                <td>{{ $akun->nama_pengguna }}</td>
                                <td>{{ $akun->email }}</td>
                                <td>{{ $akun->peran }}</td>
                            </tr>
                        @endforeach
                        <tr id="noDataRow" style="display: none">
                            <td colspan="6" class="text-center">Tidak ada data admin yang sesuai dengan pencarian...
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    const searchInput = document.getElementById('searchInput');
    const juaraFilter = document.getElementById('juaraFilter');
    const bidangLombaFilter = document.getElementById('bidangLombaFilter');
    const tableRows = document.querySelectorAll('tbody tr:not(#noDataRow)')
    const noDataRow = document.getElementById('noDataRow');

    function filterData() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedJuara = juaraFilter.value.toLowerCase();
        const selectedBidangLomba = bidangLombaFilter.value.toLowerCase();

        let rowVisible = false;

        tableRows.forEach(row => {
            const nama = row.cells[1].textContent.toLowerCase();
            const juara = row.cells[2].textContent.toLowerCase();
            const namaLomba = row.cells[3].textContent.toLowerCase();
            const bidangLomba = row.cells[4].textContent.toLowerCase();

            const isNamaMatch = nama.includes(searchValue) || namaLomba.includes(searchValue);
            const isJuaraMatch = !selectedJuara || juara.includes(selectedJuara);
            const isBidangLombaMatch = !selectedBidangLomba || bidangLomba.includes(selectedBidangLomba);

            if (isNamaMatch && isJuaraMatch && isBidangLombaMatch) {
                row.style.display = '';
                rowVisible = true;
            } else {
                row.style.display = 'none';
            }
        });

        if (!rowVisible)
            noDataRow.style.display = '';
        else
            noDataRow.style.display = 'none';
    }

    searchInput.addEventListener('input', filterData);
    juaraFilter.addEventListener('change', filterData);
    bidangLombaFilter.addEventListener('change', filterData);
</script>
