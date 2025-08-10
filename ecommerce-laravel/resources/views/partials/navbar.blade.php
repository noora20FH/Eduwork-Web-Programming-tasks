<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://via.placeholder.com/150x40/7B68EE/FFFFFF?text=K-Pop+Mart" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
            </ul>

            <div id='customer-home' class="d-flex gap-2">
                <a href="#" class="btn btn-outline-light">
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
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-seam me-2"></i>Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right text-danger me-2"></i>Logout</a></li>
                        </ul>
                    </div>
            </div>


            <div id='home' class="d-flex">
                <a href="#" class="btn btn-outline-light mx-1">Masuk</a>
                <a href="#" class="btn btn-light mx-1">Daftar</a>
            </div>


        </div>
    </div>
</nav>
