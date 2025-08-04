<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pesanan - K-Pop Mart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #7B68EE;
            --font-color: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--font-color);
            background-color: #f8f9fa;
        }

        .btn-kpop {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .btn-kpop:hover {
            background-color: #6a5acd;
            border-color: #6a5acd;
            color: white;
        }
        
        .order-card {
            border-left: 5px solid var(--primary-color);
            transition: transform 0.2s;
        }

        .order-card:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
        <div class="container">
            <a class="navbar-brand" href="#">K-Pop Mart</a>
            </div>
    </nav>
    
    <main class="container my-5">
        <h1 class="mb-4">Daftar Pesanan</h1>
        
        <div class="row g-4">
            <div class="col-12">
                <div class="card order-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold">Pesanan #101</h5>
                                <p class="card-text text-muted mb-0">Tanggal Pesanan: 24 Agustus 2025</p>
                            </div>
                            <span class="badge bg-success fs-6 px-3 py-2">Selesai</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h6 class="mb-0">Album Terbaru Group A</h6>
                                <small class="text-muted">Jumlah: 1</small>
                            </div>
                            <span class="fw-bold">Rp 350.000</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h6 class="mb-0">Hoodie Group C</h6>
                                <small class="text-muted">Jumlah: 1</small>
                            </div>
                            <span class="fw-bold">Rp 450.000</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="mb-0">Total Pembayaran</h5>
                            <h4 class="mb-0 fw-bold text-kpop-accent">Rp 800.000</h4>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="#" class="btn btn-outline-secondary">Lihat Detail Pesanan</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card order-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title fw-bold">Pesanan #100</h5>
                                <p class="card-text text-muted mb-0">Tanggal Pesanan: 20 Agustus 2025</p>
                            </div>
                            <span class="badge bg-warning text-dark fs-6 px-3 py-2">Diproses</span>
                        </div>
                        <hr>
                         <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h6 class="mb-0">Lightstick Official Group B</h6>
                                <small class="text-muted">Jumlah: 2</small>
                            </div>
                            <span class="fw-bold">Rp 1.200.000</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="mb-0">Total Pembayaran</h5>
                            <h4 class="mb-0 fw-bold text-kpop-accent">Rp 1.225.000</h4>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="#" class="btn btn-outline-secondary">Lacak Pengiriman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer py-5 mt-5" style="background-color: var(--primary-color);">
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>