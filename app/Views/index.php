<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 ">
            <h1 class="mt-4 mb-4">Dashboard</h1>
            </di>
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">UNTUK MAP</h5>
                            <div id="map" style="width: 170%; height: 450px;"></div>
                            <script>
                                var map = L.map('map').setView([-7.485091503187003, 112.46627356942513], 10);


                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: ''
                                }).addTo(map);

                                // Loop untuk menambahkan marker dari data
                                for (var i = 0; i < map.length; i++) {
                                    var packetlos = map[i].latitude;
                                    var packetlos = map[i].longitude;
                                    L.marker([latitude, longitude]).bindPopup("<b>Ini Lokasi 3</b>").addTo(map);
                                }
                            </script>
                        </div>
                        <div class="card-body"><canvas id="maps" width="100%" height="50"></canvas></div>
                    </div>
                        </div>


                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" accept-charset="utf-8" action="<?php echo base_url("Home/index"); ?>">
                                <select name="week" onchange="this.form.submit()" class="form-select form-select-sm" aria-label="Small select example">
                                    <option>-- Pilih Minggu --</option>
                                    <?php foreach ($week as $w) : ?>
                                        <option value="<?= $w['week']; ?>"><?= $w['week']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Special title treatment</h5> -->
                        </div>
                        <!-- Elemen Canvas untuk Line Chart (sebelah kanan) -->
                        <div style="display: inline-block; width: auto;">
                            <canvas id="lineChart" width="auto" height="auto"></canvas>
                        </div>
                        <script>
                            function generateRandomColor() {
                                var letters = '0123456789ABCDEF';
                                var color = '#';
                                for (var i = 0; i < 6; i++) {
                                    color += letters[Math.floor(Math.random() * 16)];
                                }
                                return color;
                            }

                            var uniqueRegencies = <?php echo json_encode($uniqueRegencies); ?>;
                            var regencyCounts = <?php echo json_encode($regencyCounts); ?>;

                            var labels = [];
                            var data = [];



                            for (const label in regencyCounts) {
                                labels.push(label)
                                data.push(regencyCounts[label])
                            }

                            // Data untuk Line Chart yang bertumpuk
                            var lineData = {
                                labels: labels, // Gunakan label dari data Anda

                                datasets: [{
                                    label: 'Data',
                                    data: data,
                                    borderColor: generateRandomColor(),
                                    borderWidth: 2,
                                    fill: true
                                }]
                            };

                            // Konfigurasi untuk Line Chart
                            var lineOptions = {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                responsive: true
                            };
                            // Inisialisasi Line Chart
                            var lineCtx = document.getElementById('lineChart').getContext('2d');
                            var lineChart = new Chart(lineCtx, {
                                type: 'line',
                                data: lineData,
                                options: lineOptions
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <canvas id="myChart"></canvas>
                                    <script>
                                        const ctx = document.getElementById('myChart');
                                        new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ['CLEAR', 'SPIKE', 'CONSECUTIVE'],
                                                datasets: [{
                                                    data: [
                                                        <?= $pl_clear; ?>, <?= $pl_spike; ?>, <?= $pl_consecutive; ?>
                                                    ],
                                                    borderWidth: 2
                                                }]
                                            },
                                            options: {
                                                cutoutPercentage: 50,
                                                responsize: true,
                                                maintainAspectRatio: false
                                            }

                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<?= $this->endSection(); ?>