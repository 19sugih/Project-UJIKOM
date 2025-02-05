<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        // untuk mengambil data variable yang ada didalam folder Models/Task
        $data = [
            'title' => 'Home',// Judul halaman
            'lists' => TaskList::all(),//mengambil semua daftar tugas dari database
            'tasks' => Task::orderBy('created_at', 'desc')->get(), // Mengambil semua tugas, diurutkan dari yang terbaru/dari terbesar ke yang terkecil
            'priorities' => Task::PRIORITIES// Mengambil daftar prioritas tugas dari Models/Task
        ];

        // Mengembalikan tampilan 'pages.home' dengan data yang sudah dikumpulkan
        return view('pages.home', $data);
    }

    public function store(Request $request) { // Validasi input yang dikirim pengguna
        $request->validate([
            'name' => 'required|max:100',//wajib diisi dan maksimal 100 karakter
            'list_id' => 'required'//wajib diisi untuk menghubungkan tugas ke daftar tugas tertentu
        ]);

        // Menyimpan data tugas baru ke dalam database menggunakan Model/Task
        Task::create([
            'name' => $request->name,// Mengambil nilai 'name' dari request
            'list_id' => $request->list_id// Mengambil nilai 'list_id' untuk menentukan daftar tugasnya
        ]);


        // Redirect kembali ke halaman sebelumnya setelah penyimpanan berhasil
        return redirect()->back();
    }

    public function complete($id) {
        // Mencari tugas berdasarkan ID, atau gagal jika tidak ditemukan
        // Kemudian, mengupdate status 'is_completed' menjadi true (tugas selesai)
        Task::findOrFail($id)->update([
            'is_completed' => true// Menandakan bahwa tugas telah selesai
        ]);

        // Redirect kembali ke halaman sebelumnya setelah penyimpanan berhasil
        return redirect()->back();
    }

    public function destroy($id) {
        Task::findOrFail($id)->delete();

        // Redirect kembali ke halaman sebelumnya setelah penyimpanan berhasil
        return redirect()->back();
    }
}