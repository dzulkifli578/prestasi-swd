<dialog id="detailJuara" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Detail Juara</h3>

        <form method="post" id="editJuara" data-turbo="false">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="juaraId">
            <label class="input input-bordered flex items-center gap-2">
                <i class="fa-solid fa-tag"></i>
                <input type="text" class="grow" id="namaJuara" placeholder="Nama Juara" name="nama" required />
            </label>
            <div class="modal-action flex justify-between">
                <div class="flex flex-row gap-2">
                    <button type="submit" class="btn btn-warning">Edit</button>
        </form>
        <form method="post" id="hapusJuara" data-turbo="false">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error" onclick="hapusDataJuara()">Hapus</button>
        </form>
    </div>
    <button class="btn" type="button" onclick="document.getElementById('detailJuara').close()">Batal</button>
    </div>
    </div>
</dialog>

<script>
    function bukaDetailJuara(juara) {
        document.getElementById('detailJuara').showModal();
        document.getElementById('editJuara').action = `{{ url('admin/juara-bidang-lomba/edit-juara') }}/${juara.id}`;
        document.getElementById('juaraId').value = juara.id;
        document.getElementById('namaJuara').value = juara.nama;
    }

    function hapusDataJuara() {
        const id = document.getElementById('juaraId').value;

        if (confirm("Yakin ingin menghapus data ini?"))
            document.getElementById('hapusJuara').action = `{{ url('admin/juara-bidang-lomba/hapus-juara') }}/${id}`
    }
</script>
