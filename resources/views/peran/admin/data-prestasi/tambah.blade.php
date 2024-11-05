<button class="btn btn-primary mb-3 hover-scale-sm" onclick="tambahDataPrestasi.showModal()">Tambah</button>
<dialog id="tambahDataPrestasi" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Tambah Data Prestasi</h3>

        <form action="{{ route('tambah-data-prestasi') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-4">
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama" class="grow" placeholder="Nama Juara" required />
                </label>
                <select class="select select-bordered w-full" name="juara_id">
                    <option disabled selected>Juara</option>
                    @foreach ($juara as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <select class="select select-bordered w-full" name="bidang_lomba_id">
                    <option disabled selected>Bidang Lomba</option>
                    @foreach ($bidangLomba as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama_lomba" class="grow" placeholder="Nama Lomba"
                        required />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="number" min="2000" max="{{ date('Y') }}" name="tahun" class="grow" placeholder="Tahun" required />
                </label>
                <input type="file" name="foto"
                    class="file-input file-input-bordered file-input-primary w-full" accept="image/jpeg, image/png, image/avif" />
            </div>
            <div class="modal-action flex justify-between">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button class="btn" type="button"
                    onclick="document.getElementById('tambahDataPrestasi').close()">Batal</button>
            </div>
        </form>
    </div>
</dialog>
