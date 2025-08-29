<x-mainlayout title="K-Pop Mart Keranjang Belanja">

    <main class="container my-5">
        <x-breadcrumb :items="[
    ['label' => 'Produk', 'url' => route('products.index')],
    ['label' => 'Cart', 'url' => route('cart')],
]" />

        <h1 class="mb-4">Keranjang Belanja</h1>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm p-3">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col" class="text-center">Harga</th>
                                    <th scope="col" class="text-center">Jumlah</th>
                                    <th scope="col" class="text-end">Total</th>
                                    <th scope="col" class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80/9370DB/FFFFFF?text=Album" class="cart-item-img rounded me-3" alt="Album Group A">
                                            <div>
                                                <h6 class="mb-0">Album Terbaru Group A</h6>
                                                <small class="text-muted">Eksklusif + Photocard</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp 350.000</td>
                                    <td class="text-center">
                                        <input type="number" class="form-control form-control-sm text-center" value="1" min="1" style="width: 70px; margin: 0 auto;">
                                    </td>
                                    <td class="text-end fw-bold">Rp 350.000</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80/FFB6C1/FFFFFF?text=Hoodie" class="cart-item-img rounded me-3" alt="Hoodie Group C">
                                            <div>
                                                <h6 class="mb-0">Hoodie Group C</h6>
                                                <small class="text-muted">Edisi Terbatas</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp 450.000</td>
                                    <td class="text-center">
                                        <input type="number" class="form-control form-control-sm text-center" value="1" min="1" style="width: 70px; margin: 0 auto;">
                                    </td>
                                    <td class="text-end fw-bold">Rp 450.000</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/80/87CEEB/FFFFFF?text=Lightstick" class="cart-item-img rounded me-3" alt="Lightstick Group B">
                                            <div>
                                                <h6 class="mb-0">Lightstick Official Group B</h6>
                                                <small class="text-muted">Bluetooth Support</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp 600.000</td>
                                    <td class="text-center">
                                        <input type="number" class="form-control form-control-sm text-center" value="2" min="1" style="width: 70px; margin: 0 auto;">
                                    </td>
                                    <td class="text-end fw-bold">Rp 1.200.000</td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-3">Ringkasan Pesanan</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Subtotal
                            <span class="fw-bold">Rp 2.000.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Pengiriman
                            <span>Rp 25.000</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Pajak
                            <span>Rp 0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 fw-bold">
                            Total
                            <span class="fs-4 text-kpop-accent">Rp 2.025.000</span>
                        </li>
                    </ul>

                    <div class="d-grid gap-2 mt-4">
                        <a class="btn btn-kpop btn-lg" href="{{ route('checkout')}}">Lanjut ke Pembayaran</a>
                        <a class="btn btn-outline-secondary" href="{{ route('products.index')}}">Lanjutkan Belanja</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-mainlayout>