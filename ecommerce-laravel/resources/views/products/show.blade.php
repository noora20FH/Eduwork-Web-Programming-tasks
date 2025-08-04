<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk - {{ $product->name }}</title>
    
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
        
        .breadcrumb-item a {
            color: var(--primary-color);
        }

        .product-image-main {
            border: 1px solid #ddd;
            padding: 5px;
        }

        .product-thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: border-color 0.2s;
        }
        
        .product-thumbnail:hover, .product-thumbnail.active {
            border-color: var(--primary-color);
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-color: var(--primary-color) var(--primary-color) white !important;
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <img id="mainProductImage" src="{{ $product->image ?? 'https://via.placeholder.com/600x600/9370DB/FFFFFF?text=No+Image' }}" class="img-fluid product-image-main rounded" alt="{{ $product->name }}">
                    <div class="d-flex flex-row mt-3 justify-content-center">
                        @if($product->image)
                        <img src="{{ $product->image }}" class="product-thumbnail me-2 rounded active" alt="{{ $product->name }}" onclick="document.getElementById('mainProductImage').src=this.src">
                        @endif
                        </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <h1>{{ $product->name }}</h1>
                <p class="lead text-muted">{{ Str::limit($product->description, 100) }}</p>
                <h2 class="text-kpop-accent fw-bold my-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                
                <p>{{ $product->description }}</p>

                <div class="d-grid gap-2">
                    <button class="btn btn-kpop btn-lg" type="button">
                        <i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang
                    </button>
                    <button class="btn btn-outline-dark btn-lg" type="button">Beli Sekarang</button>
                </div>
                
                <hr class="my-4">
                
                <p><strong>Kategori:</strong> Album, Merchandise</p>
                <p><strong>Stok:</strong> <span class="text-{{ $product->stock > 0 ? 'success' : 'danger' }} fw-bold">{{ $product->stock > 0 ? 'Tersedia' : 'Habis' }}</span></p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="deskripsi-tab" data-bs-toggle="tab" data-bs-target="#deskripsi" type="button" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="spesifikasi-tab" data-bs-toggle="tab" data-bs-target="#spesifikasi" type="button" role="tab" aria-controls="spesifikasi" aria-selected="false">Spesifikasi</button>
                    </li>
                    </ul>
                <div class="tab-content border border-top-0 p-3" id="productTabsContent">
                    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="tab-pane fade" id="spesifikasi" role="tabpanel" aria-labelledby="spesifikasi-tab">
                        <p><strong>Nama Produk:</strong> {{ $product->name }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p><strong>Stok:</strong> {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        </main>

    <footer class="footer py-5 mt-5" style="background-color: var(--primary-color);">
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const thumbnails = document.querySelectorAll('.product-thumbnail');
        const mainImage = document.getElementById('mainProductImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                thumbnails.forEach(t => t.classList.remove('active'));
                thumb.classList.add('active');
                mainImage.src = thumb.src;
            });
        });
    </script>
</body>
</html>