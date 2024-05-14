<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data pengguna
        $users = User::all();

        // Tampilkan data pengguna dalam view
        return view('auth.index', compact('users'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Ambil pengguna yang ingin dihapus
        $userToDelete = User::findOrFail($request->user_id);

        // Pastikan pengguna bukan "admin"
        if ($userToDelete->username === 'admin') {
            return redirect()->route('users.index')->with('error', 'Akun "admin" tidak bisa dihapus.');
        }

        // Ambil pengguna yang sedang masuk
        $currentUser = auth()->user();

        // Pastikan ada lebih dari satu akun pengguna di database
        if (User::count() <= 1) {
            return redirect()->route('users.index')->with('error', 'Tidak bisa menghapus akun. Setidaknya satu akun harus tetap ada.');
        }

        // Pastikan pengguna tidak menghapus akunnya sendiri
        if ($currentUser->id === (int)$request->user_id) {
            return redirect()->route('users.index')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        // Hapus pengguna dari database
        $userToDelete->delete();

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'Akun berhasil dihapus.');
    }   
}
