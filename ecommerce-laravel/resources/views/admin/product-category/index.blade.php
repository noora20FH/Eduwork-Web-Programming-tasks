<x-mainlayout title="K-Pop Mart">




    <main class="container my-5">
        <h1 class="mb-4">Kategori Produk</h1>
        {{-- Tombol untuk membuka Modal --}}
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            Tambah Kategori
        </button>

        {{-- Tabel Responsif --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah Produk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products_count }}</td>
                            <td class="d-flex gap-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('product-category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                {{-- Form dan Tombol Delete --}}
                                <form action="{{ route('product-category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada produk yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Tautan Paginasi --}}
        <div class="justify-content-between align-items-center mt-4">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
        


    </main>
<!-- Modal untuk Tambah Kategori -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('product-category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="categoryName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-mainlayout>