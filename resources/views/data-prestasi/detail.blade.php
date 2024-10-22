<dialog id="detailDataPrestasi" class="modal" data-turbo="false">
    <div class="modal-box">
        <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-4">Detail Data Prestasi</h3>
        <div class="flex flex-col gap-2">
            <img alt="Gambar" class="rounded-xl shadow-xl w-auto h-auto">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text cursor-text">Nama</span>
                </div>
                <label class="input input-bordered flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" id="nama" class="grow cursor-pointer" readonly />
                </label>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text cursor-text">Juara</span>
                </div>
                <select class="select select-bordered w-full" id="detailJuaraId" disabled>
                    <option disabled selected>Juara</option>
                    @foreach ($juara as $juara)
                        <option value="{{ $juara->id }}">{{ $juara->nama }}</option>
                    @endforeach
                </select>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text cursor-text">Bidang Lomba</span>
                </div>
                <select class="select select-bordered w-full" id="detailBidangLombaId" disabled>
                    <option disabled selected>Bidang Lomba</option>
                    @foreach ($bidangLomba as $bidangLomba)
                        <option value="{{ $bidangLomba->id }}">{{ $bidangLomba->nama }}</option>
                    @endforeach
                </select>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text cursor-text">Nama Lomba</span>
                </div>
                <label class="input input-bordered flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" id="namaLomba" class="grow cursor-pointer" readonly />
                </label>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text cursor-text">Tahun</span>
                </div>
                <label class="input input-bordered flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="text" id="tahun" class="grow cursor-pointer" readonly />
                </label>
            </label>
        </div>
        <div class="modal-action">
            <button class="btn" type="button"
                onclick="document.getElementById('detailDataPrestasi').close()">Tutup</button>
        </div>
    </div>
</dialog>

<script>
    function bukaDetailDataPrestasi(prestasi) {
        console.log(prestasi);
        document.getElementById('detailDataPrestasi').showModal();
        document.getElementById('detailJuaraId').value = prestasi.juara_id;
        document.getElementById('detailBidangLombaId').value = prestasi.bidang_lomba_id;
        document.getElementById('nama').value = prestasi.nama;
        document.getElementById('namaLomba').value = prestasi.nama_lomba;
        document.getElementById('tahun').value = prestasi.tahun;
        document.querySelector('#detailDataPrestasi img').src = `{{ asset('') }}${prestasi.foto}`;
    }
</script>
