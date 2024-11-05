<dialog id="detailDataAdmin" class="modal" data-turbo="false">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Detail Data Admin</h3>
        <form method="post" id="editDataAdmin" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <input type="hidden" name="id" id="dataAdminId">
                <img alt="Gambar" class="rounded-xl shadow-lg w-auto h-auto">
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama_pengguna" id="nama_pengguna" class="grow"
                        placeholder="Nama Pengguna" />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="password" name="kata_sandi" id="kata_sandi" class="grow" placeholder="Kata Sandi" />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" class="grow" placeholder="Email" />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="peran" id="peran" class="grow" placeholder="Peran" readonly required />
                </label>
                <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full" accept="image/jpeg, image/png, image/avif" />
            </div>
            <div class="modal-action flex justify-between">
                <div class="flex flex-row gap-2">
                    <button type="submit" class="btn btn-warning">Edit</button>
        </form>
        <form method="post" id="hapusDataAdmin" data-turbo="false">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error" onclick="hapusData()">Hapus</button>
        </form>
    </div>
    <button class="btn" type="button" onclick="document.getElementById('detailDataAdmin').close()">Batal</button>
    </div>
    </div>
</dialog>

<script>
    function bukaDetailDataAdmin(akun) {
        document.getElementById('detailDataAdmin').showModal();
        document.getElementById('editDataAdmin').action = `{{ url('admin-manager/data-admin/edit') }}/${akun.id}`;
        document.getElementById('dataAdminId').value = akun.id;
        document.getElementById('nama_pengguna').value = akun.nama_pengguna;
        document.getElementById('email').value = akun.email;
        document.getElementById('peran').value = akun.peran;
        document.querySelector('#detailDataAdmin img').src = `{{ asset('') }}${akun.foto}`;
    }

    function hapusData() {
        const id = document.getElementById('dataAdminId').value;

        if (confirm("Yakin ingin menghapus data ini?"))
            document.getElementById('hapusDataAdmin').action = `{{ url('admin-manager/data-admin/hapus') }}/${id}`;
    }
</script>
