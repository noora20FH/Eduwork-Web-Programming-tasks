<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>K-Pop Mart - Merchandise K-Pop Resmi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #7B68EE; /* Warna ungu khas K-Pop */
            --secondary-color: #FFC107; /* Warna kuning untuk aksen */
            --font-color: #333;
            --bg-color: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--font-color);
            background-color: var(--bg-color);
        }

        .navbar-brand img {
            height: 40px;
        }

        .hero-section {
            background-color: #e9ecef;
            padding: 4rem 0;
            text-align: center;
        }
        
        .product-card {
            transition: transform 0.2s ease-in-out;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.15);
        }

        .product-card .card-img-top {
            height: 250px;
            object-fit: cover;
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
        
        .footer {
            background-color: var(--primary-color);
            color: white;
        }

        .text-kpop-accent {
            color: var(--secondary-color);
        }
        
        .badge-new {
            background-color: var(--secondary-color);
            color: #333;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/150x40/7B68EE/FFFFFF?text=K-Pop+Mart" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lightstick</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-light me-2">Masuk</a>
                    <a href="#" class="btn btn-light">Daftar</a>
                    <a href="#" class="btn btn-outline-light ms-2">
                        <i class="bi bi-cart"></i> </a>
                </div>
            </div>
        </div>
    </nav>

    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://via.placeholder.com/1920x600/7B68EE/FFFFFF?text=MERCHANDISE+TERBARU'); background-size: cover; background-position: center; height: 500px;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h5 class="display-4 fw-bold text-white">Album Terbaru dari Idola Favoritmu</h5>
                    <p class="lead text-white-50">Dapatkan album terbaru dengan photocard eksklusif!</p>
                    <a href="#" class="btn btn-kpop btn-lg mt-3">Belanja Sekarang</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x600/FFC107/FFFFFF?text=PROMO+LIGHTSTICK'); background-size: cover; background-position: center; height: 500px;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h5 class="display-4 fw-bold text-black">Promo Spesial Lightstick</h5>
                    <p class="lead text-black-50">Siapkan dirimu untuk konser dengan lightstick resmi!</p>
                    <a href="#" class="btn btn-kpop btn-lg mt-3">Lihat Promo</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x600/4B0082/FFFFFF?text=OFFICIAL+APPAREL'); background-size: cover; background-position: center; height: 500px;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
                    <h5 class="display-4 fw-bold text-white">Official Apparel Group Idol</h5>
                    <p class="lead text-white-50">Tampil keren dengan hoodie dan t-shirt resmi!</p>
                    <a href="#" class="btn btn-kpop btn-lg mt-3">Belanja Sekarang</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <main class="container my-5">
        
        <h2 class="text-center mb-4">Kategori Pilihan</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x300/F0F0F0/555555?text=ALBUM" class="card-img-top" alt="Album K-Pop">
                    <div class="card-body text-center">
                        <h5 class="card-title">Album & Photocard</h5>
                        <a href="#" class="btn btn-kpop mt-2">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x300/F0F0F0/555555?text=LIGHTSTICK" class="card-img-top" alt="Lightstick K-Pop">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lightstick Official</h5>
                        <a href="#" class="btn btn-kpop mt-2">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x300/F0F0F0/555555?text=APPAREL" class="card-img-top" alt="Apparel K-Pop">
                    <div class="card-body text-center">
                        <h5 class="card-title">Apparel & Aksesoris</h5>
                        <a href="#" class="btn btn-kpop mt-2">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4">Produk Pilihan</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            
            <div class="col">
                <div class="card product-card h-100">
                    <img src="https://via.placeholder.com/400x400/9370DB/FFFFFF?text=Album+Group+A" class="card-img-top" alt="Album Group A">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Album Group A</h5>
                        <p class="card-text">Album terbaru dengan photobook dan poster.</p>
                        <span class="badge badge-new mb-2">Baru</span>
                        <h4 class="text-kpop-accent fw-bold mt-auto">Rp 350.000</h4>
                        <div class="d-grid mt-2">
                            <a href="#" class="btn btn-kpop">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card product-card h-100">
                    <img src="https://via.placeholder.com/400x400/87CEEB/FFFFFF?text=Lightstick+Group+B" class="card-img-top" alt="Lightstick Group B">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Lightstick Group B</h5>
                        <p class="card-text">Lightstick resmi dengan fitur Bluetooth.</p>
                        <h4 class="text-kpop-accent fw-bold mt-auto">Rp 600.000</h4>
                        <div class="d-grid mt-2">
                            <a href="#" class="btn btn-kpop">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card product-card h-100">
                    <img src="https://via.placeholder.com/400x400/FFB6C1/FFFFFF?text=Hoodie+Group+C" class="card-img-top" alt="Hoodie Group C">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Hoodie Group C</h5>
                        <p class="card-text">Hoodie eksklusif edisi terbatas.</p>
                        <span class="badge badge-new mb-2">Baru</span>
                        <h4 class="text-kpop-accent fw-bold mt-auto">Rp 450.000</h4>
                        <div class="d-grid mt-2">
                            <a href="#" class="btn btn-kpop">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card product-card h-100">
                    <img src="https://via.placeholder.com/400x400/DA70D6/FFFFFF?text=Photocard+Set+D" class="card-img-top" alt="Photocard Set D">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Photocard Set D</h5>
                        <p class="card-text">Satu set photocard dari semua member.</p>
                        <h4 class="text-kpop-accent fw-bold mt-auto">Rp 120.000</h4>
                        <div class="d-grid mt-2">
                            <a href="#" class="btn btn-kpop">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>

    <footer class="footer py-5 mt-5">
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
                        <li><a href="#" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Ikuti Kami</h5>
                    <a href="#" class="text-white me-2 text-decoration-none">Facebook</a>
                    <a href="#" class="text-white me-2 text-decoration-none">Instagram</a>
                    <a href="#" class="text-white text-decoration-none">Twitter</a>
                </div>
            </div>
            <hr class="text-white-50">
            <div class="text-center text-white-50">
                &copy; 2025 K-Pop Mart. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>