<div class="bg-base-100 rounded-xl shadow-xl p-6">
    <div class="overflow-x-auto rounded-xl shadow-xl">
        <table class="table table-zebra">
            <thead class="bg-base-300">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @if ($log->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada log...</td>
                    </tr>
                @else
                    @foreach ($log as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->isi }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                    <tr id="noDataRow" style="display: none">
                        <td colspan="4" class="text-center">Tidak ada log yang cocok...</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const filterWaktu = document.getElementById('filterWaktu');
    const tableRows = document.querySelectorAll('tbody tr:not(#noDataRow)');
    const noDataRow = document.getElementById('noDataRow');

    function sortLogs(rows, order) {
        const sortedRows = [...rows].sort((a, b) => {
            const dateA = new Date(a.cells[3].textContent);
            const dateB = new Date(b.cells[3].textContent);
            return order === 'terbaru' ? dateB - dateA : dateA - dateB;
        });
        return sortedRows;
    }

    function filterData() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedWaktu = filterWaktu.value;

        let rowVisible = false;

        let filteredRows = tableRows;
        if (selectedWaktu)
            filteredRows = sortLogs(tableRows, selectedWaktu);

        filteredRows.forEach(row => {
            const judul = row.cells[1].textContent.toLowerCase();
            const isi = row.cells[2].textContent.toLowerCase();

            const isSearchMatch = judul.includes(searchValue) || isi.includes(searchValue);

            if (isSearchMatch) {
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
    filterWaktu.addEventListener('change', filterData);
</script>
