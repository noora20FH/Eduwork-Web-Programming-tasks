<x-authlayout title='Register - K-Pop Mart'>
            <div class="w-100 p-md-4 p-3" style="max-width: 450px;">
            <div class="mb-3 text-end">
                <a href="{{ route('login') }}" class="text-decoration-none text-muted">Login</a>
            </div>
            <h3 class="mb-3 text-center fw-semibold">Create an account</h3>
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
                    <button type="submit" class="btn btn-lg" style="background-color: #7B68EE; border-color: #7B68EE; color: white;">Sign Up With Email</button>
                </div>
            </form>
            
            <div class="d-flex align-items-center text-center text-muted my-4">
                <span class="flex-grow-1 border-bottom border-secondary-subtle"></span>
                <span class="mx-2">OR CONTINUE WITH</span>
                <span class="flex-grow-1 border-bottom border-secondary-subtle"></span>
            </div>
            
            <div class="d-grid">
                <button class="btn btn-light btn-lg border border-secondary-subtle d-flex justify-content-center align-items-center fw-medium">
                    <img src="https://www.google.com/favicon.ico" alt="Google icon" class="me-2" style="width: 20px; height: 20px;">
                    Google
                </button>
            </div>

            <div class="mt-4 text-center text-secondary" style="font-size: 0.8rem;">
                By clicking continue, you agree to our 
                <a href="#" class="text-decoration-none" style="color: #7B68EE;">Terms of Service</a> 
                and 
                <a href="#" class="text-decoration-none" style="color: #7B68EE;">Privacy Policy</a>.
            </div>
        </div>
</x-authlayout>