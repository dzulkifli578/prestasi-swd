<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Cari & Filter</h1>

    <div class="bg-base-100 rounded-xl shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <label class="input input-bordered input-primary flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="grow" placeholder="Cari" id="searchInput" />
            </label>
            <select id="juaraFilter" class="select select-primary w-full">
                <option value="" selected>Juara</option>
                @foreach ($juara as $juara)
                    <option value="{{ $juara->nama }}">{{ $juara->nama }}</option>
                @endforeach
            </select>
            <select id="bidangLombaFilter" class="select select-primary w-full">
                <option value="" selected>Bidang Lomba</option>
                @foreach ($bidangLomba as $bidangLomba)
                    <option value="{{ $bidangLomba->nama }}">{{ $bidangLomba->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
