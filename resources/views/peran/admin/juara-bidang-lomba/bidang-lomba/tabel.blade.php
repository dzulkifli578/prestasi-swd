<div class="card-section-secondary">
    <div class="overflow-x-auto rounded-xl shadow-lg">
        <table class="table table-zebra">
            <thead class="bg-base-300">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @if ($juara->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada data...</td>
                    </tr>
                @else
                    @foreach ($bidangLomba as $bidangLombaItem)
                        <tr class="cursor-pointer" onclick="bukaDetailBidangLomba({{ json_encode ($bidangLombaItem) }})">
                            <td>{{ $bidangLombaItem->id }}</td>
                            <td>{{ $bidangLombaItem->nama }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>