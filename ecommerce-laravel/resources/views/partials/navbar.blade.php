<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" style="color: #fff; font-weight: bold;">
            <img src="https://via.placeholder.com/150x40/7B68EE/FFFFFF?text=K-Pop+Mart" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#faq-section') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#about-us') }}">Tentang Kami</a>
                </li>
            </ul>

            <div id='customer-home' class="d-flex gap-2">
                <a href="{{ route('cart') }}" class="btn btn-outline-light">
                    <i class="bi bi-cart"></i>
                </a>
                <!-- Dropdown Profil Baru -->
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2">
                        <!-- Informasi Profil -->
                        <li class="profile-info d-flex align-items-center">
                            <img src="https://via.placeholder.com/48" alt="Profile Photo" class="profile-photo">
                            <div>
                                <h6 class="mb-0">Nama Pengguna</h6>
                                <p class="text-muted mb-0" style="font-size: 0.875em;">email@contoh.com</p>
                            </div>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i>Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('orders.index') }}"><i class="bi bi-box-seam me-2"></i>Orders</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="{{ route('home') }}"><i class="bi bi-box-arrow-right text-danger me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>


            <div id='home' class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-outline-light mx-1">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-light mx-1">Daftar</a>
            </div>


        </div>
    </div>
</nav>