@php
    $kontributor = [
        [
            'foto' => 'https://via.placeholder.com/1080',
            'nama' => 'Dzulkifli Anwar',
            'status' => 'Anak Magang',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'angkatan' => 'Angkatan 2021',
        ],
    ];
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ($kontributor as $kontributor)
        <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
            <div class="flex flex-col gap-y-6 w-full">
                <img src="https://via.placeholder.com/1080" alt="Prestasi" class="rounded-xl">
                <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-500">
                    <p class="text-xl lg:text-2xl font-bold">{{ $kontributor['nama'] }}</p>
                    <p class="text-lg lg:text-xl font-medium">{{ $kontributor['status'] }}</p>
                    <p class="text-base lg:text-lg font-medium">{{ $kontributor['jurusan'] }}</p>
                    <div class="border border-primary group-hover:border-warning-content ease-in-out duration-500">
                    </div>
                    <p class="text-base lg:text-lg font-medium">{{ $kontributor['angkatan'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
