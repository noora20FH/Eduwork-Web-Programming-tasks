<x-mainlayout title="Daftar Pesanan">
    <main class="container my-5">
        <h1 class="text-center mb-5 fw-bold" style="color: #7B68EE;">Daftar Pesanan</h1>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- Cek apakah ada pesanan --}}
                @forelse($orders as $order)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="card-title fw-bold">Pesanan #{{ $order->id }}</h4>
                                <p class="card-text text-muted mb-0">Tanggal Pesanan: {{ \Carbon\Carbon::parse($order->created_at)->locale('id')->isoFormat('D MMMM Y') }}</p>
                            </div>
                            @php
                                $statusClass = [
                                    'pending' => 'warning text-dark',
                                    'completed' => 'success',
                                    'failed' => 'danger',
                                ][strtolower($order->status)] ?? 'secondary';
                            @endphp
                            <span class="badge bg-{{ $statusClass }} fs-6 px-3 py-2">{{ ucfirst($order->status) }}</span>
                        </div>
                        <hr>
                        
                        {{-- Iterasi melalui item-item pesanan --}}
                        @foreach($order->orderItems as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h6 class="mb-0">{{ $item->product->name ?? 'Produk Dihapus' }}</h6>
                                <small class="text-muted">Jumlah: {{ $item->quantity }}</small>
                            </div>
                            <span class="fw-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="mb-0">Total Pembayaran</h5>
                            <h4 class="mb-0 fw-bold" style="color: #FFC107;">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</h4>
                        </div>
                        <div class="d-grid mt-3 gap-2">
                            
                                <a href="{{ route('checkout.message')}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal-{{ $order->id }}">
                                    Lakukan Pembayaran
                                </a>
                            
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $order->id }}">
                                    Lihat Detail Pesanan
                                </button>
                            
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info text-center" role="alert">
                    Anda belum memiliki riwayat pesanan.
                </div>
                @endforelse
            </div>
        </div>
    </main>

    {{-- Modals untuk Detail Pesanan --}}
    @foreach($orders as $order)
    <!-- Modal untuk Detail Pesanan -->
    <div class="modal fade" id="detailModal-{{ $order->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="detailModalLabel-{{ $order->id }}">Detail Pesanan #{{ $order->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Status Pesanan: <span class="badge bg-{{ $statusClass }}">{{ ucfirst($order->status) }}</span></h5>
                    <p class="text-muted">Tanggal Pesanan: {{ \Carbon\Carbon::parse($order->created_at)->locale('id')->isoFormat('D MMMM Y') }}</p>
                    <hr>
                    <h6 class="fw-bold">Detail Pengiriman</h6>
                    <p><strong>Nama Penerima:</strong> {{ $order->user->name ?? 'User Dihapus' }}</p>
                    <p><strong>Alamat:</strong> {{ $order->shipping_address }}</p>
                    <hr>
                    <h6 class="fw-bold">Ringkasan Pembayaran</h6>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal Produk</span>
                            <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Total Pembayaran</span>
                            <span class="text-success">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </li>
                    </ul>
                    <h6 class="fw-bold">Item Pesanan</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col" class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? 'Produk Dihapus' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="text-end">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-mainlayout>
