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
                    <form id="update-cart-form" action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Produk</th>
                                        <th scope="col" class="text-center">Harga</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col" class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cartItems as $item)
                                        <tr data-item-price="{{ $item->product->price }}" data-item-id="{{ $item->id }}">
                                            
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
                                                <input type="number" name="quantities[{{ $item->id }}]" class="form-control form-control-sm text-center cart-item-quantity @error('quantities.' . $item->id) is-invalid @enderror" value="{{ old('quantities.' . $item->id, $item->quantity) }}" min="0" style="width: 70px; display: inline-block;">
                                                @error('quantities.' . $item->id)
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td class="text-end fw-bold item-total">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Keranjang Anda kosong.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-kpop">Perbarui Keranjang</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-3">Ringkasan Pesanan</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Subtotal
                            <span class="fw-bold" id="subtotal-display">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
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
                            <span class="fs-4 text-kpop-accent" id="total-display">Rp {{ number_format($total, 0, ',', '.') }}</span>
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

    <!-- Modal Konfirmasi Kustom -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus item ini dari keranjang?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelDeleteBtn" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('update-cart-form');
            const confirmModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            const confirmBtn = document.getElementById('confirmDeleteBtn');
            const cancelBtn = document.getElementById('cancelDeleteBtn');

            let itemToDeleteInput = null;
            let originalQuantity = 1;

            // Handle confirmation for quantity 0 on form submission
            form.addEventListener('submit', function(event) {
                const quantities = form.querySelectorAll('.cart-item-quantity');
                let zeroQuantityInput = null;

                quantities.forEach(input => {
                    if (parseInt(input.value, 10) === 0) {
                        zeroQuantityInput = input;
                    }
                });

                if (zeroQuantityInput) {
                    event.preventDefault(); // Mencegah form submit
                    itemToDeleteInput = zeroQuantityInput;
                    originalQuantity = itemToDeleteInput.getAttribute('data-original-quantity') || 1;
                    confirmModal.show();
                } else {
                     // Lanjutkan dengan submit jika tidak ada kuantitas 0
                     form.submit();
                }
            });

            confirmBtn.addEventListener('click', function() {
                // Jika user mengkonfirmasi, ubah kuantitas menjadi 0 dan submit form
                confirmModal.hide();
                itemToDeleteInput.value = 0;
                // Menggunakan Promise.resolve().then() untuk memastikan modal sudah tersembunyi
                Promise.resolve().then(() => {
                    form.submit();
                });
            });

            cancelBtn.addEventListener('click', function() {
                // Jika user membatalkan, kembalikan kuantitas ke nilai semula
                itemToDeleteInput.value = originalQuantity;
                confirmModal.hide();
            });

            // Simpan kuantitas awal saat halaman dimuat
            document.querySelectorAll('.cart-item-quantity').forEach(input => {
                input.setAttribute('data-original-quantity', input.value);
            });
        });
    </script>
</x-mainlayout>
