<x-mainlayout title="K-Pop Mart Products">

    <main class="container my-5">
        <h1 class="text-center mb-5" style="color: #7B68EE;">Semua Produk</h1>

        <div class="row mb-4">
            <div class="col-lg-6 mb-3">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control rounded-pill pe-5" placeholder="Cari produk..." aria-label="Cari produk..." style="border: 1px solid #7B68EE;">
                    <span class="input-group-text bg-white border-0" style="margin-left: -50px; z-index: 10;"><i class="bi bi-search" style="color: #7B68EE;"></i></span>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column flex-md-row justify-content-end gap-2">
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

        <div class="d-flex justify-content-center mt-4">
            {{-- Menampilkan tautan paginasi dengan styling Bootstrap 5 --}}
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const kategoriFilter = document.getElementById('kategoriFilter');
            const grupFilter = document.getElementById('grupFilter');
            const sortirHarga = document.getElementById('sortirHarga');

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
</x-mainlayout>
