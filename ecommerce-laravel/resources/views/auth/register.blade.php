<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - K-Pop Mart</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #7B68EE; /* Warna ungu khas K-Pop */
            --secondary-color: #f8f9fa; /* Warna latar belakang umum */
            --text-color: #333;
            --link-color: #7B68EE;
            --font-family: 'Poppins', sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: var(--font-family);
            overflow: hidden;
        }

        .full-viewport-container {
            min-height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: row;
        }

        .register-left-bg { /* Menggunakan nama kelas yang lebih spesifik untuk register */
            background-color: var(--primary-color);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .register-left-bg h1 {
            font-weight: 700;
            margin-top: 1rem;
        }

        .register-left-bg p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .register-left-bg img {
            max-width: 100%;
            height: auto;
        }

        .register-right-area { /* Menggunakan nama kelas yang lebih spesifik untuk register */
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .form-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .btn-kpop {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }
        
        .btn-kpop:hover {
            background-color: #6a5acd;
            border-color: #6a5acd;
            color: white;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(123, 104, 238, 0.25);
        }

        .or-divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #aaa;
            margin: 1.5rem 0;
        }

        .or-divider::before, .or-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .or-divider:not(:empty)::before {
            margin-right: .5em;
        }

        .or-divider:not(:empty)::after {
            margin-left: .5em;
        }
        
        .btn-google {
            border: 1px solid #ddd;
            color: #555;
            font-weight: 500;
        }
        
        .btn-google img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
        
        @media (max-width: 767.98px) {
            .register-left-bg {
                display: none;
            }
            .register-right-area {
                width: 100%;
            }
            .form-container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="full-viewport-container">
    <!-- Sisi Kiri (Ilustrasi) -->
    <div class="col-md-6 d-none d-md-flex register-left-bg">
        <div>
            <!-- Ganti dengan path gambar ilustrasi K-Pop Anda -->
            <img src="{{ asset('image/kpop-web-logo.png') }}" alt="I love K-Pop" class="img-fluid mb-3" style="max-width: 80%;">
            <h1 class="display-5 fw-bold">Selamat Datang di K-Pop Mart</h1>
            <p class="lead mt-3">Toko online terpercaya untuk semua kebutuhan merchandise K-Pop resmi. Dapatkan koleksi terbaik dari idola favoritmu.</p>
        </div>
    </div>

    <!-- Sisi Kanan (Form Registrasi) -->
    <div class="col-md-6 register-right-area">
        <!-- Container untuk form registrasi -->
        <div class="form-container">
            <div class="mb-3 text-end">
                <a href="{{ route('login') }}" class="text-decoration-none text-muted">Login</a>
            </div>
            <h3 class="mb-3 text-center" style="font-weight: 600;">Create an account</h3>
            <p class="text-center text-muted mb-4">Enter your email below to create your account</p>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="full name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="confirm password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-kpop btn-lg">Sign In With Email</button>
                </div>
            </form>
            
            <div class="or-divider">
                <span>OR CONTINUE WITH</span>
            </div>
            
            <div class="d-grid">
                <button class="btn btn-google btn-lg d-flex justify-content-center align-items-center">
                    <img src="https://www.google.com/favicon.ico" alt="Google icon">
                    Google
                </button>
            </div>

            <div class="mt-4 text-center" style="font-size: 0.8rem;">
                By clicking continue, you agree to our 
                <a href="#" class="text-decoration-none" style="color: var(--link-color);">Terms of Service</a> 
                and 
                <a href="#" class="text-decoration-none" style="color: var(--link-color);">Privacy Policy</a>.
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
