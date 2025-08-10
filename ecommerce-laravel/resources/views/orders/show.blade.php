<x-mainlayout title="Detail Pesanan">
    <main class="container my-5">
        <h1 class="text-center mb-5 fw-bold" style="color: #7B68EE;">Detail Pesanan #{{ $order->id }}</h1>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h4 class="fw-bold">Status Pesanan: <span class="badge {{ $order->status == 'Selesai' ? 'bg-success' : 'bg-warning' }}">{{ $order->status }}</span></h4>
                                <p class="text-muted mb-0">Tanggal Pesanan: {{ $order->tanggal_pesanan }}</p>
                            </div>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                        </div>
                        
                        <hr>
                        
                        <h5 class="fw-bold">Detail Pengiriman</h5>
                        <p class="mb-1"><strong>Nama Penerima:</strong> {{ $order->customer_name }}</p>
                        <p class="mb-1"><strong>Nomor Telepon:</strong> {{ $order->customer_phone }}</p>
                        <p class="mb-3"><strong>Alamat:</strong> {{ $order->shipping_address }}</p>

                        <h5 class="fw-bold mt-4">Ringkasan Pembayaran</h5>
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
                                <span class="text-success">Rp {{ number_format($order->total_payment, 0, ',', '.') }}</span>
                            </li>
                        </ul>
                        
                        <h5 class="fw-bold mt-4">Item Pesanan</h5>
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
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->pivot->quantity }}</td>
                                        <td>Rp {{ number_format($item->pivot->price, 0, ',', '.') }}</td>
                                        <td class="text-end">Rp {{ number_format($item->pivot->quantity * $item->pivot->price, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</x-mainlayout>
