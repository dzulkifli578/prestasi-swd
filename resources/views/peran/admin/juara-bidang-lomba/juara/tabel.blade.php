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
                    @foreach ($juara as $juaraItem)
                        <tr class="cursor-pointer" onclick="bukaDetailJuara({{ json_encode($juaraItem) }})">
                            <td>{{ $juaraItem->id }}</td>
                            <td>{{ $juaraItem->nama }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
