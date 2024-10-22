<div class="bg-base-100 rounded-xl shadow-xl p-6">
    <div class="flex flex-col gap-y-6">
        <input type="text" placeholder="Cari berdasarkan nama." class="input input-bordered input-primary w-full"
            id="searchInput" />
        <div class="grid grid-cols-1 gap-y-4 lg:grid-cols-3 lg:gap-x-6">
            <select class="select select-bordered select-primary w-full" id="juaraFilter">
                <option value="" selected>Semua Juara</option>
                @foreach ($juara as $itemJuara)
                    <option value="{{ strtolower($itemJuara->nama) }}">{{ $itemJuara->nama }}</option>
                @endforeach
            </select>
            <select class="select select-bordered select-primary w-full" id="lombaFilter">
                <option value="" selected>Semua Lomba</option>
                @foreach ($bidangLomba as $itemBidangLomba)
                    <option value="{{ strtolower($itemBidangLomba->nama) }}">{{ $itemBidangLomba->nama }}</option>
                @endforeach
            </select>
            <select class="select select-bordered select-primary w-full" id="waktuFilter">
                <option value="" selected>Urutkan</option>
                <option value="terbaru">Terbaru</option>
                <option value="terlama">Terlama</option>
            </select>
        </div>
    </div>
</div>
