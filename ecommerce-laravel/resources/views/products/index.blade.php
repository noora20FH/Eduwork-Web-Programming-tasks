<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>K-Pop Mart - Halaman Produk</title>
    <!-- Font Poppins untuk tampilan yang lebih modern -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya ini harus tetap di sini karena tidak dapat dibuat inline */
        .filter-btn.active, .sort-btn.active {
            background-color: #7B68EE;
            color: white;
            border-color: #7B68EE;
        }
        .filter-btn:hover, .sort-btn:hover {
            background-color: #7B68EE;
            color: white;
            border-color: #7B68EE;
        }
        .btn-primary-custom:hover {
            background-color: #6a5acd !important;
            border-color: #6a5acd !important;
        }
    </style>
</head>

<body class="bg-light" style="font-family: 'Poppins', sans-serif; color: #333;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #7B68EE;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/150x40/7B68EE/FFFFFF?text=K-Pop+Mart" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-light me-2">
                        <i class="bi bi-cart"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light ms-2"><i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama Halaman Produk -->
    <main class="container my-5">
        <h1 class="text-center mb-5" style="color: #7B68EE;">Semua Produk</h1>

        <!-- Fitur Pencarian dan Filter -->
        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control rounded-pill pe-5" placeholder="Cari produk..." aria-label="Cari produk..." style="border: 1px solid #7B68EE;">
                    <span class="input-group-text bg-white border-0" style="margin-left: -50px; z-index: 10;"><i class="bi bi-search" style="color: #7B68EE;"></i></span>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column flex-md-row justify-content-end gap-2">
                <!-- Dropdown Filter Kategori -->
                <div class="dropdown me-md-2 mb-2 mb-md-0">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid #7B68EE; color: #495057;">
                        Kategori
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownKategori" id="kategoriFilter">
                        <li><a class="dropdown-item active" href="#" data-category="Semua">Semua</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Album">Album</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Lightstick">Lightstick</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Pakaian">Pakaian</a></li>
                        <li><a class="dropdown-item" href="#" data-category="Aksesoris">Aksesoris</a></li>
                    </ul>
                </div>

                <!-- Dropdown Filter Nama Grup -->
                <div class="dropdown me-md-2 mb-2 mb-md-0">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" id="dropdownGrup" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid #7B68EE; color: #495057;">
                        Grup
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownGrup" id="grupFilter">
                        <li><a class="dropdown-item active" href="#" data-group="Semua">Semua</a></li>
                        <li><a class="dropdown-item" href="#" data-group="Seventeen">Seventeen</a></li>
                        <li><a class="dropdown-item" href="#" data-group="Straykids">Straykids</a></li>
                        <li><a class="dropdown-item" href="#" data-group="Blackpink">Blackpink</a></li>
                        <li><a class="dropdown-item" href="#" data-group="X-Heroes">X-Heroes</a></li>
                        <li><a class="dropdown-item" href="#" data-group="NCT">NCT</a></li>
                        <li><a class="dropdown-item" href="#" data-group="Shinee">Shinee</a></li>
                        <li><a class="dropdown-item" href="#" data-group="EXO">EXO</a></li>
                    </ul>
                </div>

                <!-- Dropdown Sortir Harga -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" id="dropdownSortir" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid #7B68EE; color: #495057;">
                        Harga
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownSortir" id="sortirHarga">
                        <li><a class="dropdown-item active" href="#" data-sort="default">Default</a></li>
                        <li><a class="dropdown-item" href="#" data-sort="asc">Termurah ke Termahal</a></li>
                        <li><a class="dropdown-item" href="#" data-sort="desc">Termahal ke Termurah</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div id="productList" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            {{-- Loop through the products passed from the controller --}}
            @forelse ($products as $product)
            <div class="col">
                <div class="card card-product h-100 shadow-sm">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/400x400/CCCCCC?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                        <p class="card-text"><b>Stock: {{$product->stock}}</b></p>
                        <h4 class="fw-bold mt-auto" style="color: #FFC107;">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                        <div class="d-grid mt-2">
                            <a href="{{ route('products.show', $product->id) }}" class="btn" style="background-color: #7B68EE; border-color: #7B68EE; color: white;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">Belum ada produk yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-5 mt-5 text-white" style="background-color: #7B68EE;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>K-Pop Mart</h5>
                    <p class="text-white-50">Toko online terpercaya untuk semua kebutuhan merchandise K-Pop resmi. Dapatkan koleksi terbaik dari idola favoritmu.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Produk</a></li>
                        <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Ikuti Kami</h5>
                    <a href="#" class="text-white me-2 fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-2 fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
            <hr class="text-white-50">
            <div class="text-center text-white-50">
                &copy; 2025 K-Pop Mart. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Catatan: Seluruh fungsionalitas JavaScript untuk filter dan sortir produk
        // telah dihapus karena sekarang ditangani oleh backend Laravel.
        // Data produk akan diambil dari variabel Blade `$products`.
        // Event listeners di bawah ini tidak akan berfungsi tanpa backend.

        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const kategoriFilter = document.getElementById('kategoriFilter');
            const grupFilter = document.getElementById('grupFilter');
            const sortirHarga = document.getElementById('sortirHarga');

            // Contoh: Mengganti teks dropdown saat filter diklik (front-end visual saja)
            kategoriFilter.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') {
                    kategoriFilter.querySelectorAll('.dropdown-item').forEach(item => item.classList.remove('active'));
                    e.target.classList.add('active');
                    document.getElementById('dropdownKategori').textContent = e.target.textContent;
                }
            });

            grupFilter.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') {
                    grupFilter.querySelectorAll('.dropdown-item').forEach(item => item.classList.remove('active'));
                    e.target.classList.add('active');
                    document.getElementById('dropdownGrup').textContent = e.target.textContent;
                }
            });

            sortirHarga.addEventListener('click', (e) => {
                if (e.target.tagName === 'A') {
                    sortirHarga.querySelectorAll('.dropdown-item').forEach(item => item.classList.remove('active'));
                    e.target.classList.add('active');
                    document.getElementById('dropdownSortir').textContent = e.target.textContent;
                }
            });
        });
    </script>
</body>

</html>
