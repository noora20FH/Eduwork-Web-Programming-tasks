
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk - K-Pop Mart</title>
    
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
        
        .card-product {
            transition: transform 0.2s ease-in-out;
        }
        
        .card-product:hover {
            transform: translateY(-5px);
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
        <h1 class="mb-4">Semua Produk</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            {{-- Loop through the products passed from the controller --}}
            @forelse ($products as $product)
            <div class="col">
                <div class="card card-product h-100 shadow-sm">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/400x400/CCCCCC?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                        <p class="text-kpop-accent fw-bold mt-auto">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-kpop w-100">Lihat Detail</a>
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

    <footer class="footer py-5 mt-5" style="background-color: var(--primary-color);">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>