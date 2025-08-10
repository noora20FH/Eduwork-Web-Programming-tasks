<x-mainlayout title="Daftar Pesanan">

    <main class="container my-5">
        <h1 class="text-center mb-5 fw-bold" style="color: #7B68EE;">Daftar Pesanan</h1>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- Contoh data pesanan --}}
                @php
                    $orders = [
                        (object) [
                            'id' => 101,
                            'tanggal_pesanan' => '24 Agustus 2025',
                            'status' => 'Selesai',
                            'customer_name' => 'John Doe',
                            'shipping_address' => 'Jl. Merdeka No. 101, Jakarta Pusat',
                            'subtotal_amount' => 800000,
                            'shipping_fee' => 0,
                            'total_pembayaran' => 800000,
                            'items' => [
                                (object) ['nama' => 'Album Terbaru Group A', 'jumlah' => 1, 'harga' => 350000],
                                (object) ['nama' => 'Hoodie Group C', 'jumlah' => 1, 'harga' => 450000],
                            ],
                        ],
                        (object) [
                            'id' => 100,
                            'tanggal_pesanan' => '20 Agustus 2025',
                            'status' => 'Diproses',
                            'customer_name' => 'Jane Smith',
                            'shipping_address' => 'Jl. Kebon Jeruk No. 20, Jakarta Barat',
                            'subtotal_amount' => 1200000,
                            'shipping_fee' => 25000,
                            'total_pembayaran' => 1225000, // Mengasumsikan sudah termasuk biaya kirim
                            'items' => [
                                (object) ['nama' => 'Lightstick Official Group B', 'jumlah' => 2, 'harga' => 600000],
                            ],
                        ],
                    ];
                @endphp
                
                @foreach($orders as $order)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="card-title fw-bold">Pesanan #{{ $order->id }}</h4>
                                <p class="card-text text-muted mb-0">Tanggal Pesanan: {{ $order->tanggal_pesanan }}</p>
                            </div>
                            <span class="badge {{ $order->status == 'Selesai' ? 'bg-success' : 'bg-warning text-dark' }} fs-6 px-3 py-2">{{ $order->status }}</span>
                        </div>
                        <hr>
                        
                        @foreach($order->items as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <h6 class="mb-0">{{ $item->nama }}</h6>
                                <small class="text-muted">Jumlah: {{ $item->jumlah }}</small>
                            </div>
                            <span class="fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="mb-0">Total Pembayaran</h5>
                            <h4 class="mb-0 fw-bold" style="color: #FFC107;">Rp {{ number_format($order->total_pembayaran, 0, ',', '.') }}</h4>
                        </div>
                        <div class="d-grid mt-3">
                            @if($order->status == 'Diproses')
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#trackingModal-{{ $order->id }}">
                                    Lacak Pengiriman
                                </button>
                            @else
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $order->id }}">
                                    Lihat Detail Pesanan
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    {{-- Modals untuk Detail dan Lacak Pengiriman --}}
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
                    <h5>Status Pesanan: <span class="badge {{ $order->status == 'Selesai' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $order->status }}</span></h5>
                    <p class="text-muted">Tanggal Pesanan: {{ $order->tanggal_pesanan }}</p>
                    <hr>
                    <h6 class="fw-bold">Detail Pengiriman</h6>
                    <p><strong>Nama Penerima:</strong> {{ $order->customer_name ?? 'N/A' }}</p>
                    <p><strong>Alamat:</strong> {{ $order->shipping_address ?? 'N/A' }}</p>
                    <hr>
                    <h6 class="fw-bold">Ringkasan Pembayaran</h6>
                    <ul class="list-group list-group-flush mb-3">
                         <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal Produk</span>
                            <span>Rp {{ number_format($order->subtotal_amount, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Biaya Pengiriman</span>
                            <span>Rp {{ number_format($order->shipping_fee, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Total Pembayaran</span>
                            <span class="text-success">Rp {{ number_format($order->total_pembayaran, 0, ',', '.') }}</span>
                        </li>
                    </ul>
                    <h6 class="fw-bold">Item Pesanan</h6>
                    <ul class="list-group">
                        @foreach($order->items as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $item->nama }} (x{{ $item->jumlah }})</span>
                            <span>Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal untuk Lacak Pengiriman -->
    @if($order->status == 'Diproses')
    <div class="modal fade" id="trackingModal-{{ $order->id }}" tabindex="-1" aria-labelledby="trackingModalLabel-{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="trackingModalLabel-{{ $order->id }}">Lacak Pengiriman Pesanan #{{ $order->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nomor Resi:</strong> <span class="text-primary">XY123456789</span></p>
                    <p><strong>Status:</strong> Sedang dalam perjalanan ke gudang sortir</p>
                    <hr>
                    <h6>Riwayat Pengiriman</h6>
                    <ul class="list-unstyled">
                        <li><small>25 Agustus 2025 - Pesanan diserahkan ke kurir</small></li>
                        <li><small>24 Agustus 2025 - Pesanan sedang dikemas</small></li>
                        <li><small>24 Agustus 2025 - Pesanan diterima</small></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</x-mainlayout>
