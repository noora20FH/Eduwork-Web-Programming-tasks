<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil dari pengguna yang sedang terautentikasi.
     * @return \Illuminate\View\View
     */
    public function show()
    {
        /** @var User $user */
        // Mendapatkan instance pengguna yang sedang login.
        $user = Auth::user();

        // Mengembalikan view 'profile.show' dengan data pengguna.
        return view('profile.show', compact('user'));
    }

    /**
     * Menampilkan formulir untuk mengedit profil pengguna.
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        /** @var User $user */
        // Mendapatkan pengguna yang sedang login.
        $user = Auth::user();

        // Mengembalikan view 'profile.edit' dengan data pengguna untuk diisi di formulir.
        return view('profile.edit', compact('user'));
    }

    /**
     * Memperbarui data profil pengguna yang sedang terautentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        /** @var User $user */
        // Mendapatkan instance pengguna yang sedang login.
        $user = Auth::user();

        try {
            // Validasi data input dari formulir.
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed', // 'confirmed' akan memeriksa field 'password_confirmation'
                'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Memperbarui nama dan email pengguna.
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];

            // Jika pengguna memasukkan kata sandi baru, perbarui kata sandi.
            if ($request->filled('password')) {
                $user->password = Hash::make($validatedData['password']);
            }

            // Jika ada foto profil baru yang diunggah.
            if ($request->hasFile('photo_profile')) {
                // Hapus foto lama jika ada.
                if ($user->photo_profile) {
                    Storage::disk('public')->delete($user->photo_profile);
                }

                // Simpan foto baru ke direktori 'public/profiles'.
                $photoPath = $request->file('photo_profile')->store('profiles', 'public');
                $user->photo_profile = $photoPath;
            }

            // Simpan perubahan ke database.
            $user->save();

            // Redirect kembali ke halaman profil dengan pesan sukses.
            return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');

        } catch (ValidationException $e) {
            // Tangani error validasi dan kembali ke halaman sebelumnya dengan input dan error.
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
}
