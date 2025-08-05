// Data produk dalam bentuk array of objects
const products = [
    {
        id: 1,
        nama: "Gelang Manik-manik Pelangi",
        deskripsi: "Gelang tangan dengan manik-manik warna-warni yang cerah. Cocok untuk semua usia.",
        harga: 35000,
        gambar: "https://via.placeholder.com/400x300/e6e6e6?text=Gelang+Pelangi",
        kategori: "Gelang"
    },
    {
        id: 2,
        nama: "Kalung Batu Alam",
        deskripsi: "Kalung elegan dengan liontin batu alam asli. Desain minimalis dan natural.",
        harga: 75000,
        gambar: "https://via.placeholder.com/400x300/d9d9d9?text=Kalung+Batu+Alam",
        kategori: "Kalung"
    },
    {
        id: 3,
        nama: "Cincin Perak Ukir",
        deskripsi: "Cincin perak murni dengan ukiran motif bunga yang halus. Buatan tangan.",
        harga: 120000,
        gambar: "https://via.placeholder.com/400x300/cccccc?text=Cincin+Perak",
        kategori: "Cincin"
    },
    {
        id: 4,
        nama: "Gelang Tali Etnik",
        deskripsi: "Gelang tali kepang dengan hiasan manik-manik kayu. Nuansa etnik yang kuat.",
        harga: 45000,
        gambar: "https://via.placeholder.com/400x300/bfbfbf?text=Gelang+Tali",
        kategori: "Gelang"
    },
    {
        id: 5,
        nama: "Kalung Mutiara Air Tawar",
        deskripsi: "Kalung dengan untaian mutiara air tawar asli. Sempurna untuk acara formal.",
        harga: 150000,
        gambar: "https://via.placeholder.com/400x300/b3b3b3?text=Kalung+Mutiara",
        kategori: "Kalung"
    },
    {
        id: 6,
        nama: "Cincin Kawin Handmade",
        deskripsi: "Cincin pasangan yang dibuat dengan tangan secara presisi. Bisa custom ukiran.",
        harga: 250000,
        gambar: "https://via.placeholder.com/400x300/a6a6a6?text=Cincin+Kawin",
        kategori: "Cincin"
    }
];

// Dapatkan elemen-elemen DOM yang diperlukan
const productContainer = document.getElementById('productContainer');
const searchInput = document.getElementById('searchInput');
const categoryFilter = document.getElementsByName('categoryFilter');
const priceSort = document.getElementsByName('priceSort');


let currentProducts = [...products];

// Fungsi untuk menampilkan modal detail produk
function showProductDetailModal(product) {
    const modalTitle = document.getElementById('productDetailModalLabel');
    const modalImage = document.getElementById('modalProductImage');
    const modalCategory = document.getElementById('modalProductCategory');
    const modalDescription = document.getElementById('modalProductDescription');
    const modalPrice = document.getElementById('modalProductPrice');
    const quantityInput = document.getElementById('quantityInput');
    
    // Isi data ke modal
    modalTitle.textContent = product.nama;
    modalImage.src = product.gambar;
    modalImage.alt = product.nama;
    modalCategory.textContent = product.kategori;
    modalDescription.textContent = product.deskripsi;
    modalPrice.textContent = `Rp ${product.harga.toLocaleString('id-ID')}`;
    quantityInput.value = 1; // Atur ulang jumlah ke 1 setiap kali modal dibuka

    // Tampilkan modal
    const productDetailModal = new bootstrap.Modal(document.getElementById('productDetailModal'));
    productDetailModal.show();
}

// Perbarui fungsi renderProducts()
function renderProducts(productsToDisplay) {
    productContainer.innerHTML = '';
    if (productsToDisplay.length === 0) {
        productContainer.innerHTML = '<div class="col-12 text-center text-muted">Produk tidak ditemukan.</div>';
        return;
    }

    productsToDisplay.forEach(product => {
        const productCard = `
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="${product.gambar}" class="card-img-top" alt="${product.nama}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">${product.nama}</h5>
                        <p class="card-text text-muted small">${product.kategori}</p>
                        <p class="card-text">${product.deskripsi}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5 text-primary">Rp ${product.harga.toLocaleString('id-ID')}</span>
                            <button class="btn btn-custom-pink btn-sm" data-product-id="${product.id}">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        productContainer.innerHTML += productCard;
    });

    // Tambahkan event listener setelah produk dirender
    document.querySelectorAll('.btn-custom-pink').forEach(button => {
        button.addEventListener('click', (event) => {
            const productId = event.target.dataset.productId;
            const selectedProduct = products.find(p => p.id == productId);
            if (selectedProduct) {
                showProductDetailModal(selectedProduct);
            }
        });
    });
}

// Tambahkan logika untuk tombol plus dan minus di dalam modal
document.getElementById('minusButton').addEventListener('click', () => {
    const quantityInput = document.getElementById('quantityInput');
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

document.getElementById('plusButton').addEventListener('click', () => {
    const quantityInput = document.getElementById('quantityInput');
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
});


// Fungsi utama untuk memfilter dan mengurutkan
function filterAndSortProducts() {
    let filteredProducts = [...products];
    const searchTerm = searchInput.value.toLowerCase();
    
    // Filter berdasarkan kategori
    const selectedCategory = [...categoryFilter].find(radio => radio.checked).value;
    if (selectedCategory !== 'all') {
        filteredProducts = filteredProducts.filter(product => product.kategori === selectedCategory);
    }
    
    // Filter berdasarkan pencarian
    if (searchTerm) {
        filteredProducts = filteredProducts.filter(product => 
            product.nama.toLowerCase().includes(searchTerm) || 
            product.deskripsi.toLowerCase().includes(searchTerm)
        );
    }
    
    // Urutkan berdasarkan harga
    const selectedSort = [...priceSort].find(radio => radio.checked).value;
    if (selectedSort === 'high') {
        filteredProducts.sort((a, b) => b.harga - a.harga);
    } else if (selectedSort === 'low') {
        filteredProducts.sort((a, b) => a.harga - b.harga);
    }
    
    // Tampilkan produk yang sudah difilter dan diurutkan
    renderProducts(filteredProducts);
}

// Tambahkan event listener untuk memantau perubahan
searchInput.addEventListener('input', filterAndSortProducts);

// Gunakan perulangan untuk menambahkan event listener pada radio button
[...categoryFilter].forEach(radio => radio.addEventListener('change', filterAndSortProducts));
[...priceSort].forEach(radio => radio.addEventListener('change', filterAndSortProducts));

// Inisialisasi tampilan produk saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', () => {
    renderProducts(products);
});

