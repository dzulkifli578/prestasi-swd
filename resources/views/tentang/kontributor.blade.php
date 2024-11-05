@php
    $kontributor = [
        [
            'id' => 1,
            'foto' => asset('img/tentang/inisiator-1.jpg'),
            'nama' => 'Yogi Aprilian, S. Kom',
            'status' => 'Guru TKJ',
            'jurusan' => 'Teknik Komputer dan Jaringan',
            'sebutan' => 'Inisiator 1',
        ],
        [
            'id' => 2,
            'foto' => asset('img/tentang/inisiator-2.jpg'),
            'nama' => 'Yusuf Anggara, S. Kom',
            'status' => 'Kepala Jurusan RPL',
            'jurusan' => 'Teknik Komputer dan Jaringan',
            'sebutan' => 'Inisiator 2',
        ],
        [
            'id' => 3,
            'foto' => asset('img/tentang/kreator.jpg'),
            'nama' => 'Dzulkifli Anwar',
            'status' => 'Anak Magang',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'sebutan' => 'Kreator Website',
        ],
    ];
@endphp

<div class="bg-base-300 rounded-xl shadow-lg p-6 m-6 hover:ring-2 hover:ring-base-content ease-in-out duration-300">
    <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold hover:scale-105 ease-in-out duration-300">Kontributor</h1>
    <div class="border border-primary my-6"></div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($kontributor as $kontributor)
            <div class="group card-section-secondary cursor-pointer hover:bg-warning transition-smooth" onclick="bukaDetailKontributor{{ $kontributor['id'] }}()">
                <div class="flex flex-col gap-y-6 w-full">
                    <img src="{{ asset($kontributor['foto']) }}" alt="Prestasi"
                        class="object-cover w-auto h-auto rounded-xl">
                    <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-300">
                        <p class="text-xl lg:text-2xl font-bold">{{ $kontributor['nama'] }}</p>
                        <p class="text-lg lg:text-xl font-medium tracking-wide">{{ $kontributor['status'] }}</p>
                        <p class="text-base lg:text-lg font-medium tracking-wide">{{ $kontributor['jurusan'] }}</p>
                        <div class="border border-primary group-hover:border-warning-content ease-in-out duration-300">
                        </div>
                        <p class="text-base lg:text-lg font-semibold tracking-wide">{{ $kontributor['sebutan'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
