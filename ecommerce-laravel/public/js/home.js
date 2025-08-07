
        document.addEventListener('DOMContentLoaded', () => {
            // Data produk contoh dengan kategori grup
            const products = [{
                name: "Album 'Don't Wanna Cry'",
                group: "Seventeen",
                price: "Rp 350.000",
                image: "https://via.placeholder.com/400x400/9370DB/FFFFFF?text=Album+Seventeen",
                description: "Album lengkap dengan photocard dan poster.",
                isNew: true
            }, {
                name: "Lightstick 'Carat Bong'",
                group: "Seventeen",
                price: "Rp 600.000",
                image: "https://via.placeholder.com/400x400/87CEEB/FFFFFF?text=Lightstick+Seventeen",
                description: "Lightstick official untuk konser.",
                isNew: false
            }, {
                name: "Album 'S-Class'",
                group: "Straykids",
                price: "Rp 380.000",
                image: "https://via.placeholder.com/400x400/FFB6C1/FFFFFF?text=Album+Straykids",
                description: "Album terbaru dengan photocard eksklusif.",
                isNew: true
            }, {
                name: "Hoodie 'Blackpink'",
                group: "Blackpink",
                price: "Rp 475.000",
                image: "https://via.placeholder.com/400x400/DA70D6/FFFFFF?text=Hoodie+Blackpink",
                description: "Hoodie official untuk penggemar Blackpink.",
                isNew: false
            }, {
                name: "Album 'Overload'",
                group: "X-Heroes",
                price: "Rp 250.000",
                image: "https://via.placeholder.com/400x400/9370DB/FFFFFF?text=Album+X-Heroes",
                description: "Mini album pertama dari Xdinary Heroes.",
                isNew: true
            }, {
                name: "Kaos 'NCTzen'",
                group: "NCT",
                price: "Rp 180.000",
                image: "https://via.placeholder.com/400x400/87CEEB/FFFFFF?text=Kaos+NCT",
                description: "Kaos fanmade dengan logo NCTzen.",
                isNew: false
            }, {
                name: "Album 'Odd Eye'",
                group: "Shinee",
                price: "Rp 300.000",
                image: "https://via.placeholder.com/400x400/FFB6C1/FFFFFF?text=Album+Shinee",
                description: "Album comeback Shinee.",
                isNew: true
            }, {
                name: "Photocard 'EXO'",
                group: "EXO",
                price: "Rp 120.000",
                image: "https://via.placeholder.com/400x400/DA70D6/FFFFFF?text=Photocard+EXO",
                description: "Set photocard edisi terbatas.",
                isNew: false
            }];

            const productList = document.getElementById('product-list');
            const productTitle = document.getElementById('product-section-title');
            const filterButtons = document.getElementById('filter-buttons');

            // Fungsi untuk merender produk berdasarkan grup
            const renderProducts = (group) => {
                productList.innerHTML = ''; // Kosongkan daftar produk
                const filteredProducts = group === 'Semua' ? products : products.filter(p => p.group === group);

                // Ubah judul bagian produk
                productTitle.textContent = `Produk ${group}`;

                // Loop untuk membuat card produk
                filteredProducts.forEach(product => {
                    const col = document.createElement('div');
                    col.classList.add('col');
                    col.innerHTML = `
                        <div class="card h-100 shadow-sm">
                            <img src="${product.image}" class="card-img-top" alt="${product.name}" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">${product.description}</p>
                                ${product.isNew ? '<span class="badge bg-warning text-dark mb-2">Baru</span>' : ''}
                                <h4 class="fw-bold mt-auto" style="color: #FFC107;">${product.price}</h4>
                                <div class="d-grid mt-2">
                                    <a href="#" class="btn" style="background-color: #7B68EE; border-color: #7B68EE; color: white;">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    `;
                    productList.appendChild(col);
                });
            };

            // Event listener untuk tombol filter
            filterButtons.addEventListener('click', (e) => {
                if (e.target.tagName === 'BUTTON') {
                    // Hapus kelas 'active' dari semua tombol
                    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                    // Tambahkan kelas 'active' ke tombol yang diklik
                    e.target.classList.add('active');

                    const group = e.target.dataset.group;
                    renderProducts(group);
                }
            });

            // Render semua produk saat halaman pertama kali dimuat
            renderProducts('Semua');
        });
   