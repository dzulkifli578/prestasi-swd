<dialog id="detailDataPrestasi" class="modal" data-turbo="false">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Detail Data Prestasi</h3>
        <form method="post" id="editDataPrestasi" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <input type="hidden" name="id" id="dataPrestasiId">
                <img alt="Gambar" class="rounded-xl shadow-lg w-auto h-auto">
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama" id="nama" class="grow" placeholder="Nama Juara"
                        required />
                </label>
                <select class="select select-bordered w-full" name="juara_id" id="detailJuaraId">
                    <option disabled selected>Juara</option>
                    @foreach ($juara as $juara)
                        <option value="{{ $juara->id }}">{{ $juara->nama }}</option>
                    @endforeach
                </select>
                <select class="select select-bordered w-full" name="bidang_lomba_id" id="detailBidangLombaId">
                    <option disabled selected>Bidang Lomba</option>
                    @foreach ($bidangLomba as $bidangLomba)
                        <option value="{{ $bidangLomba->id }}">{{ $bidangLomba->nama }}
                        </option>
                    @endforeach
                </select>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama_lomba" id="namaLomba" class="grow" placeholder="Nama Lomba"
                        required />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="number" min="2000" max="{{ date('Y') }}" name="tahun" id="tahun" class="grow"
                        placeholder="Tahun" required />
                </label>
                <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full" accept="image/jpeg, image/png, image/avif" />
            </div>
            <div class="modal-action flex justify-between">
                <div class="flex flex-row gap-2">
                    <button type="submit" class="btn btn-warning">Edit</button>
        </form>
        <form method="post" id="hapusDataPrestasi" data-turbo="false">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error" onclick="hapusData()">Hapus</button>
        </form>
    </div>
    <button class="btn" type="button" onclick="document.getElementById('detailDataPrestasi').close()">Batal</button>
    </div>
    </div>
</dialog>

<script>
    function bukaDetailDataPrestasi(prestasi) {
        console.log(prestasi);
        document.getElementById('detailDataPrestasi').showModal();
        document.getElementById('editDataPrestasi').action = `{{ url('admin/data-prestasi/edit') }}/${prestasi.id}`;
        document.getElementById('dataPrestasiId').value = prestasi.id;
        document.getElementById('detailJuaraId').value = prestasi.juara_id;
        document.getElementById('detailBidangLombaId').value = prestasi.bidang_lomba_id;
        document.getElementById('nama').value = prestasi.nama;
        document.getElementById('namaLomba').value = prestasi.nama_lomba;
        document.getElementById('tahun').value = prestasi.tahun;

        const imgElement = document.querySelector('#detailDataPrestasi img');
        let noPhotoMessage = document.querySelector('#detailDataPrestasi .no-photo-message');

        if (prestasi.foto) {
            imgElement.src = `{{ asset('') }}${prestasi.foto}`;
            imgElement.style.display = 'block';
            if (noPhotoMessage) {
                noPhotoMessage.style.display = 'none';
            }
        } else {
            imgElement.style.display = 'none';
            if (!noPhotoMessage) {
                noPhotoMessage = document.createElement('div');
                noPhotoMessage.className = 'bg-base-300 rounded-xl shadow-lg p-6 no-photo-message';
                noPhotoMessage.innerHTML = '<h1 class="text-error text-center">Tidak ada foto.</h1>';
                imgElement.parentNode.insertBefore(noPhotoMessage, imgElement);
            } else {
                noPhotoMessage.style.display = 'block';
            }
        }
    }

    function hapusData() {
        const id = document.getElementById('dataPrestasiId').value;

        if (confirm("Yakin ingin menghapus data ini?"))
            document.getElementById('hapusDataPrestasi').action = `{{ url('admin/data-prestasi/hapus') }}/${id}`;
    }
</script>
