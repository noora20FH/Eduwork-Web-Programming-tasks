<x-homelayout title="Edit Profile">

<div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card">
                    <h2 class="text-center mb-4">Edit Profile</h2>

                    <form>
                        <div class="text-center mb-4">
                            <div class="profile-photo-container">
                                <img id="profile-image" src="https://via.placeholder.com/150" alt="Profile Photo" class="profile-photo">
                                <label for="profile-photo-upload" class="edit-photo-overlay">
                                    <i class="bi bi-camera"></i>
                                </label>
                                <input type="file" id="profile-photo-upload" class="d-none" accept="image/*">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" value="Nama Pengguna" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="email@contoh.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi baru" aria-describedby="passwordHelpBlock">
                            <div id="passwordHelpBlock" class="form-text">
                                Biarkan kosong jika tidak ingin mengubah kata sandi.
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn text-white" style="background-color: var(--primary-color);">Simpan Perubahan</button>
                            <a href="#" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-homelayout>