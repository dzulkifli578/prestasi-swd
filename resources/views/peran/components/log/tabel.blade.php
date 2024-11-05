<div class="card-section-primary transition-smooth">
    <div class="flex flex-row w-full justify-between">
        <h1 class="card-title-primary hover-scale-sm">Aktivitas</h1>
        <form
            action="{{ session('peran') === 'admin' ? route('hapus-log-admin', ['id' => session('id')]) : route('hapus-log-admin-manager', ['id' => session('id')]) }}"
            method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-error hover-scale-sm" type="submit">Hapus
                Log</button>
        </form>
    </div>

    <div class="bg-base-100 rounded-xl shadow-lg p-6">
        <div class="overflow-x-auto rounded-xl shadow-lg">
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
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('tbody tr:not(#noDataRow)');
    const noDataRow = document.getElementById('noDataRow');

    function filterData() {
        const searchValue = searchInput.value.toLowerCase();

        let rowVisible = false;

        tableRows.forEach(row => {
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
</script>
