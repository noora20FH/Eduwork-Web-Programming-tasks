   // Logika untuk menyembunyikan/menampilkan elemen navbar berdasarkan route
        const customerHomeNav = document.getElementById('customer-home');
        const homeNav = document.getElementById('home');
        const currentPath = window.location.pathname;

        // Secara default, sembunyikan keduanyaF
        customerHomeNav.classList.add('d-none');
        homeNav.classList.add('d-none');

        // Tampilkan yang sesuai berdasarkan URL
        if (currentPath === '/') {
            // Tampilkan tombol untuk halaman utama (login/daftar)
            homeNav.classList.remove('d-none');
        } else {
            // Tampilkan ikon keranjang dan profil untuk customer
            customerHomeNav.classList.remove('d-none');
        }