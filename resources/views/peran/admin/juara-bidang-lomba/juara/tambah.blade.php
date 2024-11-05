<button class="btn btn-primary mb-3 hover-scale-sm" onclick="tambahJuara.showModal()">Tambah</button>
<dialog id="tambahJuara" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Tambah Juara</h3>

        <form action="{{ route('tambah-juara') }}" method="post" data-turbo="false">
            @csrf
            <label class="input input-bordered flex items-center gap-2">
                <i class="fa-solid fa-tag"></i>
                <input type="text" class="grow" placeholder="Nama Juara" name="nama" required />
            </label>
            <div class="modal-action flex justify-between">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button class="btn" type="button"
                    onclick="document.getElementById('tambahJuara').close()">Batal</button>
            </div>
        </form>
    </div>
</dialog>