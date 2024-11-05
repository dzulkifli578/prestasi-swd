<dialog id="detailDataPrestasi" class="modal" data-turbo="false">
    <div class="modal-box">
        <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-4">Detail Data Prestasi</h3>
        <div class="flex flex-col gap-2">
            <img alt="Gambar" class="rounded-xl shadow-lg w-auto h-auto">
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
                <label class="input input-bordered flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-trophy"></i>
                    <input type="text" id="juara" class="grow cursor-pointer" readonly />
                </label>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text cursor-text">Bidang Lomba</span>
                </div>
                <label class="input input-bordered flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-flask"></i>
                    <input type="text" id="bidangLomba" class="grow cursor-pointer" readonly />
                </label>
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
        document.getElementById('detailDataPrestasi').showModal();
        document.getElementById('nama').value = prestasi.nama;
        document.getElementById('juara').value = prestasi.juara.nama;
        document.getElementById('namaLomba').value = prestasi.nama_lomba;
        document.getElementById('bidangLomba').value = prestasi.bidang_lomba.nama;
        document.getElementById('tahun').value = prestasi.tahun;

        const imgElement = document.querySelector('#detailDataPrestasi img');
        const noPhotoMessage = document.querySelector('#detailDataPrestasi .no-photo-message');

        if (prestasi.foto) {
            imgElement.src = `{{ asset('') }}${prestasi.foto}`;
            imgElement.style.display = 'block';
            if (noPhotoMessage) noPhotoMessage.style.display = 'none';
        } else {
            imgElement.style.display = 'none';
            if (!noPhotoMessage) {
                const noPhotoDiv = document.createElement('div');
                noPhotoDiv.className = 'bg-base-300 rounded-xl shadow-lg p-6 no-photo-message';
                noPhotoDiv.innerHTML = '<h1 class="text-error text-center">Tidak ada foto.</h1>';
                imgElement.parentNode.insertBefore(noPhotoDiv, imgElement);
            } else {
                noPhotoMessage.style.display = 'block';
            }
        }
    }
</script>