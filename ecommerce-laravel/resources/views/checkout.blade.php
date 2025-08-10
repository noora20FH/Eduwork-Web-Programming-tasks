<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - K-Pop Mart</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome untuk ikon (opsional, tapi berguna untuk UI) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #7B68EE;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --link-color: #7B68EE;
            --font-family: 'Poppins', sans-serif;
            --kpop-accent: #7B68EE; /* Warna kustom untuk highlight */
        }

        body {
            font-family: var(--font-family);
            background-color: var(--secondary-color);
            color: var(--text-color);
        }

        .container {
            max-width: 1100px;
        }

        .checkout-progress {
            margin-bottom: 2rem;
        }

        .checkout-progress .breadcrumb-item.active {
            color: var(--kpop-accent);
        }

        .card-order-summary .list-group-item {
            border-bottom: 1px solid rgba(0, 0, 0, .05);
        }

        .card-order-summary .list-group-item:last-child {
            border-bottom: none;
        }
        
        .card-product-detail img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .btn-kpop {
            background-color: var(--kpop-accent);
            border-color: var(--kpop-accent);
            color: white;
            font-weight: 600;
        }
        
        .btn-kpop:hover {
            background-color: #6a5acd;
            border-color: #6a5acd;
            color: white;
        }
    </style>
</head>
<body>

<main class="container my-5">
    <h1 class="mb-4">Checkout</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb checkout-progress">
            <li class="breadcrumb-item"><a href="#">Keranjang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
            <li class="breadcrumb-item">Pembayaran</li>
            <li class="breadcrumb-item">Selesai</li>
        </ol>
    </nav>
    
    <div class="row g-4">
        <div class="col-lg-8">
            <!-- Informasi Pengiriman -->
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="mb-4">Informasi Pengiriman</h5>
                <div class="mb-3">
                    <p class="mb-1"><strong>Nama Lengkap:</strong> John Doe</p>
                    <p class="mb-1"><strong>Nomor HP:</strong> +628123456789</p>
                    <p class="mb-0"><strong>Alamat Lengkap:</strong> Jl. Sudirman No. 123, RT 01/RW 02, Kota Surabaya, Provinsi Jawa Timur, 60234</p>
                </div>
            </div>

            <!-- Detail Pesanan -->
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="mb-4">Detail Pesanan</h5>
                <div class="list-group list-group-flush">
                    <div class="list-group-item card-product-detail d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center">
                            <img src="https://placehold.co/80x80/7B68EE/FFF?text=Album" alt="Album Terbaru Group A" class="me-3">
                            <div>
                                <h6 class="mb-0">Album Terbaru Group A</h6>
                                <small class="text-muted">Harga satuan: Rp 350.000</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-4 text-muted">1x</span>
                            <span class="fw-bold">Rp 350.000</span>
                        </div>
                    </div>
                    <div class="list-group-item card-product-detail d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center">
                            <img src="https://placehold.co/80x80/7B68EE/FFF?text=Hoodie" alt="Hoodie Group C" class="me-3">
                            <div>
                                <h6 class="mb-0">Hoodie Group C</h6>
                                <small class="text-muted">Harga satuan: Rp 450.000</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-4 text-muted">1x</span>
                            <span class="fw-bold">Rp 450.000</span>
                        </div>
                    </div>
                    <div class="list-group-item card-product-detail d-flex align-items-center justify-content-between py-3">
                        <div class="d-flex align-items-center">
                            <img src="https://placehold.co/80x80/7B68EE/FFF?text=Lightstick" alt="Lightstick Group B" class="me-3">
                            <div>
                                <h6 class="mb-0">Lightstick Group B</h6>
                                <small class="text-muted">Harga satuan: Rp 600.000</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-4 text-muted">2x</span>
                            <span class="fw-bold">Rp 1.200.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="card shadow-sm p-4">
                <h5 class="mb-4">Pilih Metode Pembayaran</h5>
                <div class="my-3">
                    <div class="form-check mb-2">
                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">
                            <i class="fas fa-credit-card me-2"></i> Kartu Kredit / Debit
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input id="bank" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="bank">
                            <i class="fas fa-university me-2"></i> Bank Transfer
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="ewallet" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="ewallet">
                            <i class="fas fa-wallet me-2"></i> E-wallet (DANA, OVO, GoPay)
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="col-lg-4">
            <div class="card shadow-sm p-4 sticky-top" style="top: 2rem;">
                <h5 class="mb-3">Ringkasan Pesanan</h5>
                <ul class="list-group list-group-flush card-order-summary">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Subtotal Pesanan</strong>
                        <span>Rp 2.000.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Subtotal Pengiriman</strong>
                        <span>Rp 25.000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between fw-bold fs-5">
                        <strong>Total Pembayaran</strong>
                        <span class="text-kpop-accent">Rp 2.025.000</span>
                    </li>
                </ul>
                <hr class="my-4">
                <div class="d-grid gap-2">
                    <button class="btn btn-kpop btn-lg" type="button">Buat Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
