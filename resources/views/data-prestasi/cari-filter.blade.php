<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Cari & Filter</h1>

    <div class="card-section-secondary">
        <div class="flex flex-col gap-y-6">
            <label class="input input-bordered input-primary flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="grow" placeholder="Cari" id="searchInput" />
            </label>
            <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 md:gap-x-6">
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
            </div>
        </div>
    </div>
</div>
