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
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
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