<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">
        Statistik</h1>
    <div class="border border-primary my-6"></div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-col gap-y-6 group-hover:text-warning-content transition-smooth">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Jumlah Prestasi</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">{{ $jumlahPrestasi }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-col gap-y-6 group-hover:text-warning-content transition-smooth">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Jumlah Juara</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold">{{ $jumlahJuara }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-medal text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-col gap-y-6 group-hover:text-warning-content transition-smooth">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Jumlah Bidang Lomba</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold">{{ $jumlahBidangLomba }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-crosshairs text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="group card-section-secondary hover:bg-warning transition-smooth">
        <h2 class="card-title-secondary group-hover:text-warning-content transition-smooth">Prestasi Per Tahun</h2>
        <canvas id="lineChart" style="width: 100%; height: 400px"></canvas>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-6">
        <div class="group card-section-secondary hover:bg-warning transition-smooth">
            <h2 class="card-title-secondary group-hover:text-warning-content transition-smooth">Juara</h2>
            <canvas id="doughnutChartJuara"></canvas>
        </div>

        <div class="group card-section-secondary hover:bg-warning transition-smooth">
            <h2 class="card-title-secondary group-hover:text-warning-content transition-smooth">Bidang Lomba</h2>
            <canvas id="doughnutChartBidang"></canvas>
        </div>

        <div class="group card-section-secondary hover:bg-warning transition-smooth">
            <h2 class="card-title-secondary group-hover:text-warning-content transition-smooth">Lokasi Lomba</h2>
            <canvas id="doughnutChartTempat"></canvas>
        </div>
    </div>

    <div class="group card-section-secondary hover:bg-warning transition-smooth">
        <h2 class="card-title-secondary group-hover:text-warning-content transition-smooth">Individu dengan Juara
            Terbanyak</h2>
        <canvas id="barChartNama" style="width: 100%; height: 300px"></canvas>
    </div>
</div>

<script>
    const prestasiPertahun = @json($prestasiPerTahun);
    const labelPrestasiPerTahun = prestasiPertahun.map(item => item.tahun);
    const dataPrestasiPerTahun = prestasiPertahun.map(item => item.jumlah);

    const lineCtx = document.getElementById('lineChart').getContext('2d');
    const lineChart = new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: labelPrestasiPerTahun,
            datasets: [{
                label: 'Jumlah Prestasi',
                data: dataPrestasiPerTahun,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: false
            }
        }
    });
</script>

<script>
    const juaraTerbanyak = @json($juaraTerbanyak);
    const labelJuaraTerbanyak = juaraTerbanyak.map(item => item.juara);
    const dataJuaraTerbanyak = juaraTerbanyak.map(item => item.jumlah);

    const doughnutCtxJuara = document.getElementById('doughnutChartJuara').getContext('2d');
    const doughnutChartJuara = new Chart(doughnutCtxJuara, {
        type: 'doughnut',
        data: {
            labels: labelJuaraTerbanyak,
            datasets: [{
                data: dataJuaraTerbanyak,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            plugins: {
                legend: false
            }
        }
    });
</script>

<script>
    const bidangLombaTerbanyak = @json($bidangLombaTerbanyak);
    const labelBidangLombaTerbanyak = bidangLombaTerbanyak.map(item => item.bidang_lomba);
    const dataBidangLombaTerbanyak = bidangLombaTerbanyak.map(item => item.jumlah);

    const doughnutCtxBidang = document.getElementById('doughnutChartBidang').getContext('2d');
    const doughnutChartBidang = new Chart(doughnutCtxBidang, {
        type: 'doughnut',
        data: {
            labels: labelBidangLombaTerbanyak,
            datasets: [{
                data: dataBidangLombaTerbanyak,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 205, 86, 0.6)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            plugins: {
                legend: false
            }
        }
    });
</script>

<script>
    const lokasiLombaTerbanyak = @json($lokasiLombaTerbanyak);
    const labelLokasiLombaTerbanyak = lokasiLombaTerbanyak.map(item => item.nama_lomba);
    const dataLokasiLombaTerbanyak = lokasiLombaTerbanyak.map(item => item.jumlah);

    const doughnutCtxTempat = document.getElementById('doughnutChartTempat').getContext('2d');
    const doughnutChartTempat = new Chart(doughnutCtxTempat, {
        type: 'doughnut',
        data: {
            labels: labelLokasiLombaTerbanyak,
            datasets: [{
                data: dataLokasiLombaTerbanyak,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(201, 203, 207, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            plugins: {
                legend: false
            }
        }
    });
</script>

<script>
    const pesertaLombaTerbanyak = @json($pesertaLombaTerbanyak);
    const labelPesertaLombaTerbanyak = pesertaLombaTerbanyak.map(item => item.nama);
    const dataPesertaLombaTerbanyak = pesertaLombaTerbanyak.map(item => item.jumlah);

    const barCtxNama = document.getElementById('barChartNama').getContext('2d');
    const barChartNama = new Chart(barCtxNama, {
        type: 'bar',
        data: {
            labels: labelPesertaLombaTerbanyak,
            datasets: [{
                label: 'Jumlah Juara',
                data: dataPesertaLombaTerbanyak,
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: false
            }
        }
    });
</script>
