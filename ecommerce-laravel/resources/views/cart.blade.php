<x-mainlayout title="K-Pop Mart Keranjang Belanja">
    <main class="container my-5">
        <x-breadcrumb :items="[
            ['label' => 'Produk', 'url' => route('products.index')],
            ['label' => 'Keranjang', 'url' => route('cart.index')],
        ]" />

        <h1 class="mb-4">Keranjang Belanja</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
                                @forelse ($cartItems as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/image/' . $item->product->image) }}" class="cart-item-img rounded me-3" alt="{{ $item->product->name }}">
                                                <div>
                                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                    <small class="text-muted">{{ Str::limit($item->product->description, 30) }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input type="number" name="quantity" class="form-control form-control-sm text-center" value="{{ $item->quantity }}" min="1" style="width: 70px;">
                                                    <button type="submit" class="btn btn-sm btn-info ms-2" title="Perbarui Kuantitas">
                                                        <i class="bi bi-arrow-clockwise"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-end fw-bold">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus dari Keranjang">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Keranjang Anda kosong.</td>
                                    </tr>
                                @endforelse
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
                            <span class="fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Pengiriman
                            <span>Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Pajak
                            <span>Rp {{ number_format($tax, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 fw-bold">
                            Total
                            <span class="fs-4 text-kpop-accent">Rp {{ number_format($total, 0, ',', '.') }}</span>
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
