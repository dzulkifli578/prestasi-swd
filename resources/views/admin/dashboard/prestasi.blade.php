<div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
    <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Prestasi Terbaru</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($prestasi as $prestasi)
            <div class="group bg-base-100 hover:bg-warning ease-in-out duration-500 rounded-xl shadow-xl p-6">
                <div class="flex flex-col gap-y-6 w-full">
                    <img src="{{ asset($prestasi->foto) }}" alt="Prestasi"
                        class="rounded-xl">
                    <div class="flex flex-col gap-y-2 group-hover:text-warning-content ease-in-out duration-500">
                        <p class="text-xl lg:text-2xl font-bold">{{ $prestasi->nama }}</p>
                        <p class="text-lg lg:text-xl font-medium">{{ $prestasi->juara }}</p>
                        <p class="text-base lg:text-lg font-medium">{{ $prestasi->nama_lomba }}</p>
                        <div class="border border-primary group-hover:border-warning-content ease-in-out duration-500">
                        </div>
                        <p class="text-base lg:text-lg font-medium">{{ $prestasi->tahun }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
