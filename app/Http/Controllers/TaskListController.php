<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input yang dikirim pengguna
        // 'name' wajib diisi dengan maksimal 100 karakter
        $request->validate([
            'name' => 'required|unique:task_lists,name|max:255'
        ]); // User harus mengisi nama dengan maksimal 255 huruf

        // Menyimpan data ke dalam database menggunakan model TaskList
        TaskList::create([
            'name' => $request->name, // Mengambil nilai 'name' dari request
        ]);

        // Redirect kembali ke halaman sebelumnya setelah penyimpanan berhasil
        return redirect()->back()->with('success', 'List berhasil ditambahkan');
    }

    public function destroy($id)
    {
        TaskList::findOrFail($id)->delete();
        // Mencari TaskList berdasarkan ID, jika tidak ditemukan akan menghasilkan error 404

        return redirect()->back(); // Mengembalikan pengguna ke halaman sebelumnya setelah menghapus data
    }

    public function update(Request $request, TaskList $list)
    {
        $request->validate([ // Melakukan validasi input agar field 'name' wajib diisi dan maksimal 100 karakter
            'name' => 'required|max:100' 
        ]);

        TaskList::findOrFail($list->id)->update([ // Mencari TaskList berdasarkan ID dan memperbarui kolom 'name' dengan data dari request
            'name' => $request->name
        ]);

        return redirect()->back(); // Mengembalikan pengguna ke halaman sebelumnya setelah pembaruan data
    }
}