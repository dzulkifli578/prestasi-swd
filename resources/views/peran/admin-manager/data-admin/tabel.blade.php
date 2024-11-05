<div class="card-section-secondary">
    <div class="overflow-x-auto rounded-xl shadow-lg">
        <table id="dataTable" class="table table-zebra">
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
                        <td colspan="4" class="text-center">Tidak ada data admin...</td>
                    </tr>
                @else
                    @foreach ($akun as $akun)
                        <tr class="hover:bg-base-200 cursor-pointer"
                            onclick="bukaDetailDataAdmin({{ json_encode($akun) }})">
                            <th>{{ $akun->id }}</th>
                            <td>{{ $akun->nama_pengguna }}</td>
                            <td>{{ $akun->email }}</td>
                            <td>{{ $akun->peran }}</td>
                        </tr>
                    @endforeach
                    <tr id="noDataRow" style="display: none">
                        <td colspan="4" class="text-center">Tidak ada data admin yang sesuai dengan pencarian...
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = Array.from(document.querySelectorAll('#dataTable tbody tr:not(#noDataRow)'));
        let visibleRowCount = 0;

        rows.forEach(row => {
            const rowText = Array.from(row.cells).map(cell => cell.textContent.toLowerCase()).join(' ');
            if (rowText.includes(filter)) {
                row.style.display = '';
                visibleRowCount++;
            } else
                row.style.display = 'none';
        });

        document.getElementById('noDataRow').style.display = visibleRowCount > 0 ? 'none' : '';
    });
</script>
