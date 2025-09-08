<x-mainlayout title="K-Pop Mart Checkout">

    <main class="container my-5">
        @php
        $items = [
        ['label' => 'Produk', 'url' => route('products.index')],
        ['label' => 'Cart', 'url' => route('cart.index')],
        ['label' => 'Checkout', 'url' => '#'],
        ];
        @endphp

        <x-breadcrumb :items="$items" />
        <h1 class="mb-4">Checkout</h1>



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
                        <a href="{{ route('orders.index')}}" class="btn btn-kpop btn-lg" type="button">Buat Pesanan</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-mainlayout>