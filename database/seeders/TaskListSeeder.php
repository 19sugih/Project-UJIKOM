<?php
//seeder adalah data percobaan untuk coba coba

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskList;


//class TaskListSeeder extends Seeder adalah seeder khusus untuk mengisi tabel task_lists dengan data awal atau dummy secara otomatis.
class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Fungsi ini digunakan untuk mengisi tabel 'task_lists' dengan data awal.
     */

    //public function run(): void biasanya digunakan dalam seeder Laravel untuk memasukkan data ke dalam database secara otomatis
    public function run(): void
    {
        // Mendefinisikan array yang berisi data task list
        $lists = [
            [
                'name' => 'Liburan', // Nama daftar tugas pertama
            ],
            [
                'name' => 'Belajar', // Nama daftar tugas kedua
            ],
            [
                'name' => 'Tugas', // Nama daftar tugas ketiga
            ]
        ];

        // Menyisipkan data ke dalam tabel task_lists menggunakan metode insert()
        TaskList::insert($lists);
    }
}