<button class="btn btn-primary mb-3 hover-scale-sm" onclick="tambahDataAdmin.showModal()">Tambah</button>

<dialog id="tambahDataAdmin" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Tambah Data Prestasi</h3>

        <form action="{{ route('tambah-data-admin') }}" method="post" enctype="multipart/form-data" data-turbo="false">
            @csrf
            <div class="flex flex-col gap-4">
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama_pengguna" class="grow" placeholder="Nama Pengguna" required />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="password" name="kata_sandi" class="grow" placeholder="Kata Sandi"
                        required />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" class="grow" placeholder="Email" required />
                </label>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="peran" name="peran" value="admin" class="grow" placeholder="Peran" readonly required />
                </label>
                <input type="file" name="foto"
                    class="file-input file-input-bordered file-input-primary w-full" />
            </div>
            <div class="modal-action flex justify-between">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button class="btn" type="button"
                    onclick="document.getElementById('tambahDataAdmin').close()">Batal</button>
            </div>
        </form>
    </div>
</dialog>
