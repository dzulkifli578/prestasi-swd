<div class="bg-base-100 rounded-xl shadow-xl p-6">
    <div class="overflow-x-auto rounded-xl shadow-xl">
        <table class="table">
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
                        <tr class="hover:bg-base-200 cursor-pointer" onclick="bukaDetailBidangLomba({{ json_encode ($bidangLombaItem) }})">
                            <td>{{ $bidangLombaItem->id }}</td>
                            <td>{{ $bidangLombaItem->nama }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('admin.juara-bidang-lomba.bidang-lomba.detail')