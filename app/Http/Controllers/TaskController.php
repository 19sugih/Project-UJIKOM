<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan daftar tugas dan daftar task list berdasarkan pencarian (jika ada)
    public function index(Request $request)
    {   
        // Mengambil query pencarian dari request (jika ada)
        $query = $request->input('query');

        if ($query) {
            // Jika ada query pencarian, cari tugas (tasks) yang namanya atau deskripsinya mengandung kata kunci
            $tasks = Task::where('name', 'like', "%{$query}%") // Mencari berdasarkan nama tugas
                ->orWhere('description', 'like', "%{$query}%") // Mencari berdasarkan deskripsi tugas
                ->latest() // Mengurutkan berdasarkan waktu terbaru
                ->get(); // Mengambil data tugas dari database
            
            // Mencari daftar tugas (task list) yang mengandung kata kunci atau memiliki tugas yang mengandung kata kunci
            $lists = TaskList::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%") // Mencari daftar tugas berdasarkan nama
                    ->orWhereHas('tasks', function ($q) use ($query) {
                        // Mencari daftar tugas yang memiliki tugas dengan nama atau deskripsi sesuai kata kunci
                        $q->where('name', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%");
                    });
            })->get(); // Mengambil data daftar tugas dari database
        } else {
            // Jika tidak ada pencarian, ambil semua tugas dan semua daftar tugas
            $tasks = Task::latest()->get(); // Mengambil semua tugas, diurutkan dari yang terbaru
            $lists = TaskList::all();  // Mengambil semua daftar tugas
        }

        // Menyiapkan data yang akan dikirimkan ke tampilan
        $data = [ 
            'title' => 'Home', // Judul halaman
            'lists' => $lists, // Data daftar tugas
            'tasks' => $tasks, // Data tugas
            'priorities' => Task::PRIORITIES // Data prioritas tugas yang tersedia
        ];

        return view('pages.home', $data); // Mengembalikan tampilan halaman utama dan mengirimkan data ke view 'pages.home'
    }


    // Menyimpan tugas baru ke database
    public function store(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|max:100', // Nama wajib diisi dan maksimal 100 karakter
            'description' => 'max:255', // Deskripsi maksimal 255 karakter
            'priority' => 'required|in:low,medium,high', // Prioritas harus bernilai low, medium, atau high
            'list_id' => 'required' // ID task list harus diisi
        ]);

        // Menyimpan tugas baru
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);


        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    // Menandai tugas sebagai selesai
    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    // Menghapus tugas dari database
    public function destroy($id)
    {
        Task::findOrFail($id)->delete(); // Cari tugas berdasarkan ID, jika tidak ditemukan akan error

        return redirect()->route('home'); // Kembali ke halaman utama
    }

    // Menampilkan detail tugas berdasarkan ID
    public function show($id)
    {
        $data = [
            'title' => 'Task',
            'lists' => TaskList::all(), // Mengambil semua task list
            'task' => Task::findOrFail($id), // Mengambil tugas berdasarkan ID, jika tidak ditemukan akan error
        ];

        return view('pages.details', $data); // Menampilkan halaman detail tugas
    }

    // Mengubah daftar tugas dari sebuah tugas
    public function changeList(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id', // Memastikan list_id valid dan ada di database
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id // Memperbarui list_id tugas 
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    // Memperbarui tugas yang ada di database
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required', // ID task list harus diisi
            'name' => 'required|max:100', // Nama wajib diisi dan maksimal 100 karakter
            'description' => 'max:255', // Deskripsi maksimal 255 karakter
            'priority' => 'required|in:low,medium,high' // Prioritas harus valid
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }

    

    public function profil()
    {
        $data = [
            'title' => 'About Me',
        ];

        return view('partials.profil', $data);

    }

}