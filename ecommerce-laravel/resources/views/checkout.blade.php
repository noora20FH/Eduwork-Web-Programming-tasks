<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - K-Pop Mart</title>
    
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

        .checkout-progress .list-group-item {
            color: #ccc;
        }
        
        .checkout-progress .list-group-item.active {
            color: var(--primary-color);
            background-color: transparent;
            border-color: var(--primary-color);
        }
        
        .card-order-summary .list-group-item {
            border: none;
            padding: 0.75rem 0;
        }
        
        .card-order-summary .list-group-item:last-child {
            border-top: 1px solid #ddd;
            margin-top: 1rem;
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
                <div class="card shadow-sm p-4 mb-4">
                    <h5 class="mb-4">Informasi Pengiriman</h5>
                    <form action="#" method="POST">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Nama Depan</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Nama Belakang</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <input type="text" class="form-control" id="address" placeholder="Contoh: Jl. Sudirman No. 123, RT 01/RW 02" required>
                            </div>
                            <div class="col-md-5">
                                <label for="city" class="form-label">Kota/Kabupaten</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Provinsi</label>
                                <select class="form-select" id="province" required>
                                    <option value="">Pilih...</option>
                                    <option>Jawa Timur</option>
                                    <option>DKI Jakarta</option>
                                    <option>Jawa Barat</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="zip" required>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card shadow-sm p-4">
                    <h5 class="mb-4">Metode Pembayaran</h5>
                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                            <label class="form-check-label" for="credit">Kartu Kredit / Debit</label>
                        </div>
                        <div class="form-check">
                            <input id="bank" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="bank">Bank Transfer</label>
                        </div>
                        <div class="form-check">
                            <input id="ewallet" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="ewallet">E-wallet (DANA, OVO, GoPay)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm p-4 sticky-top" style="top: 2rem;">
                    <h5 class="mb-3">Ringkasan Pesanan</h5>
                    <ul class="list-group list-group-flush card-order-summary">
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6>Album Terbaru Group A</h6>
                                <small class="text-muted">1x</small>
                            </div>
                            <span>Rp 350.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6>Hoodie Group C</h6>
                                <small class="text-muted">1x</small>
                            </div>
                            <span>Rp 450.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6>Lightstick Group B</h6>
                                <small class="text-muted">2x</small>
                            </div>
                            <span>Rp 1.200.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Subtotal</strong>
                            <span class="fw-bold">Rp 2.000.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Pengiriman</strong>
                            <span>Rp 25.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Total</strong>
                            <span class="fs-4 fw-bold text-kpop-accent">Rp 2.025.000</span>
                        </li>
                    </ul>
                    <hr>
                    <div class="d-grid gap-2">
                        <button class="btn btn-kpop btn-lg" type="submit">Konfirmasi Pesanan</button>
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