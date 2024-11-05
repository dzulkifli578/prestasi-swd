<dialog id="detailBidangLomba" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Edit Bidang Lomba</h3>

        <form method="post" id="editBidangLomba" data-turbo="false">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="bidangLombaId" />
            <label class="input input-bordered flex items-center gap-2">
                <i class="fa-solid fa-tag"></i>
                <input type="text" class="grow" id="namaBidangLomba" placeholder="Nama Bidang Lomba" name="nama"
                    required />
            </label>
            <div class="modal-action flex justify-between">
                <div class="flex flex-row gap-2">
                    <button type="submit" class="btn btn-warning">Edit</button>
        </form>
        <form method="post" id="hapusBidangLomba" data-turbo="false">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error" onclick="hapusDataBidangLomba()">Hapus</button>
        </form>
    </div>
    <button class="btn" type="button" onclick="document.getElementById('detailBidangLomba').close()">Batal</button>
    </div>
    </div>
</dialog>

<script>
    function bukaDetailBidangLomba(bidangLomba) {
        document.getElementById('detailBidangLomba').showModal();
        document.getElementById('bidangLombaId').value = bidangLomba.id;
        document.getElementById('namaBidangLomba').value = bidangLomba.nama;
        document.getElementById('editBidangLomba').action =
            `{{ url('admin/juara-bidang-lomba/edit-bidang-lomba') }}/${bidangLomba.id}`;
    }

    function hapusDataBidangLomba() {
        const id = document.getElementById('bidangLombaId').value;

        if (confirm("Yakin ingin menghapus data ini?"))
            document.getElementById('hapusBidangLomba').action =
                `{{ url('admin/juara-bidang-lomba/hapus-bidang-lomba') }}/${id}`;
    }
</script>
