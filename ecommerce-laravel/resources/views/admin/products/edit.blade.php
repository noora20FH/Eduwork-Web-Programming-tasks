<x-mainlayout title="K-Pop Mart">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengubah ID form menjadi 'product-form' agar sesuai dengan halaman create
            const form = document.getElementById('edit-product-form');

            if (form) {
                form.addEventListener('submit', function(e) {
                    // Hentikan pengiriman form secara default
                    e.preventDefault();

                    // Bersihkan pesan error sebelumnya
                    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                    document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

                    let valid = true;

                    // Fungsi untuk menampilkan pesan error
                    const showValidationError = (input, message) => {
                        input.classList.add('is-invalid');
                        const errorDiv = document.createElement('div');
                        errorDiv.classList.add('invalid-feedback');
                        errorDiv.textContent = message;
                        // Perbaikan: Sisipkan pesan error tepat setelah input
                        input.insertAdjacentElement('afterend', errorDiv);
                        valid = false;
                    };

                    // Validasi Nama Produk
                    const nameInput = document.getElementById('name');
                    if (!nameInput.value.trim()) {
                        showValidationError(nameInput, 'Nama Produk wajib diisi!');
                    }

                    // Validasi Grup
                    const groupInput = document.getElementById('group');
                    if (!groupInput.value.trim()) {
                        showValidationError(groupInput, 'Grup wajib diisi!');
                    }

                    // Validasi Kategori - Menggunakan ID 'category_id'
                    const categoryInput = document.getElementById('product_category_id');
                    if (!categoryInput.value) {
                        showValidationError(categoryInput, 'Kategori wajib dipilih!');
                    }

                    // Validasi Harga
                    const priceInput = document.getElementById('price');
                    const priceValue = parseFloat(priceInput.value);
                    if (isNaN(priceValue) || priceValue <= 0) {
                        showValidationError(priceInput, 'Harga harus lebih dari 0!');
                    }

                    // Validasi Stok
                    const stockInput = document.getElementById('stock');
                    const stockValue = parseInt(stockInput.value);
                    if (isNaN(stockValue) || stockValue < 0) {
                        showValidationError(stockInput, 'Stok tidak boleh negatif!');
                    }

                    // Validasi Deskripsi
                    const descriptionInput = document.getElementById('description');
                    if (!descriptionInput.value.trim()) {
                        showValidationError(descriptionInput, 'Deskripsi wajib diisi!');
                    }

                    // Jika semua valid, kirim form
                    if (valid) {
                        form.submit();
                    }
                });
            }
        });
    </script>
    <main class="container my-5">
        <h1>Edit Produk</h1>
        <hr>

        <form action="{{ route('admin-products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="edit-product-form">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$product->name)}}" required>
                @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="group" class="form-label">Grup</label>
                <input type="text" class="form-control" id="group" name="group" value="{{old('group',$product->group)}}" required>
                @error('group')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product_category_id" class="form-label">Kategori</label>
                <select class="form-control" id="product_category_id" name="product_category_id" required>
                    <option value="">Pilih Kategori</option>
                    {{-- Loop through categories passed from the controller --}}
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{old('product_category_id',$product->product_category_id) == $category->id ? 'selected' : ''}}> {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('product_category_id')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" step="500" min="0" value="{{old('price',$product->price)}}" required>
                @error('price')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock',$product->stock)}}" required>
                @error('stock')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <img src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail mb-2" style="width: 150px;">
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{old('description',$product->description)}}</textarea>
                @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan Produk</button>
            <a href="{{ route('admin-products.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </main>
</x-mainlayout>