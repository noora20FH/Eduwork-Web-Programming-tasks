<x-mainlayout title="K-Pop Mart">
    <main class="container my-5">
        <h1 class="mb-4">Admin Dashboard</h1>
        
        <div class="row g-4">
            <!-- Kartu Ringkasan Jumlah Produk -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-primary shadow-sm h-100 rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold text-uppercase">Jumlah Produk</h5>
                            <i class="bi bi-box-seam h1 opacity-50"></i>
                        </div>
                        <h2 class="display-4 fw-bold">150</h2>
                        <p class="card-text opacity-75">Produk aktif</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Ringkasan Jumlah Kategori -->
            <div class="col-md-4">
                <div class="card text-black bg-custom-secondary shadow-sm h-100 rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold text-uppercase">Jumlah Kategori</h5>
                            <i class="bi bi-tags h1 opacity-50"></i>
                        </div>
                        <h2 class="display-4 fw-bold">20</h2>
                        <p class="card-text opacity-75">Kategori tersedia</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Ringkasan Jumlah Klik -->
            <div class="col-md-4">
                <div class="card text-black bg-custom-logo shadow-sm h-100 rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold text-uppercase">Total Klik Produk</h5>
                            <i class="bi bi-graph-up h1 opacity-50"></i>
                        </div>
                        <h2 class="display-4 fw-bold">5.432</h2>
                        <p class="card-text opacity-75">Klik dalam 30 hari terakhir</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <p>Di sini Anda dapat menambahkan tabel produk terbaru, grafik penjualan, atau informasi admin lainnya.</p>
        </div>
    </main>

</x-mainlayout>