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
                            <h5 class="card-title">Special title treatment</h5>
                        </div>
                        <div style="width: auto; margin: auto;">
                            <canvas id="donutChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('donutChart').getContext('2d');
                            var donutChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Label 1', 'Label 2', 'Label 3'],
                                    datasets: [{
                                        data: [30, 40, 20],
                                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                                    }]
                                },
                                options: {
                                    cutoutPercentage: 70, // Nilai ini mengontrol ukuran lubang di tengah donut chart
                                    responsive: true
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
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