<?php
//seeder adalah data percobaan untuk coba coba

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//class TaskSeeder extends Seeder digunakan untuk mengisi tabel tasks dengan data awal atau dummy secara otomatis.
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Fungsi ini digunakan untuk mengisi tabel 'tasks' dengan data awal.
     */

     //public function run(): void biasanya digunakan dalam seeder Laravel untuk memasukkan data ke dalam database secara otomatis
    public function run(): void
    {
        // Mendefinisikan array yang berisi data tugas
        $tasks = [
            [
                'name' => 'Belajar Laravel',//nama tugas
                'description' => 'Belajar Laravel di santri koding',//deskripsi tugas
                'is_completed' => false,//status tugas (belum selesai)
                'priority' => 'medium',//prioritas tugas (medium)
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'belajar'
            ],
            [
                'name' => 'Belajar React',//nama tugas
                'description' => 'Belajar React di WPU',//deskripsi tugas
                'is_completed' => true,//status tugas (sudah selesai)
                'priority' => 'high',//prioritas tugas (high)
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'belajar'
            ],
            [
                'name' => 'Pantai',//nama tugas
                'description' => 'Liburan ke Pantai bersama keluarga',//deskripsi tugas
                'is_completed' => false,//status tugas (belum selesai)
                'priority' => 'low',//prioritas tugas (low)
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'liburan'
            ],
            [
                'name' => 'Villa',//nama tugas
                'description' => 'Liburan ke Villa bersama teman sekolah',//deskripsi tugas
                'is_completed' => true,//status tugas (sudah selesai)
                'priority' => 'medium',//prioritas tugas (medium)
                'list_id' => TaskList::where('name', 'Liburan')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'liburan'
            ],
            [
                'name' => 'Matematika',//nama tugas
                'description' => 'Tugas Matematika bu Nina',//deskripsi tugas
                'is_completed' => true,//status tugas (sudah selesai)
                'priority' => 'medium',//prioritas tugas (medium)
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'tugas'
            ],
            [
                'name' => 'PAIBP',//nama tugas
                'description' => 'Tugas presentasi pa budi',//deskripsi tugas
                'is_completed' => false,//status tugas(belum selesai)
                'priority' => 'high',//prioritas tugas (high)
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'tugas'
            ],
            [
                'name' => 'Project Ujikom',//nama tugas
                'description' => 'Membuat project Todo App untuk ujikom',//deskripsi tugas
                'is_completed' => false,//status tugas (belum selesai)
                'priority' => 'high',//prioritas tugas (high)
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,//menentukan list_id berdasarkan daftar tugas dengan nama 'tugas'
            ],
        ];

        Task::insert($tasks);// Menyisipkan data tugas ke dalam tabel tasks menggunakan metode insert()
    }
}