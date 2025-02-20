<?php

namespace Database\Seeders;
//seeder merupakan data cadangan/data awal untuk percobaan

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//class DatabaseSeeder extends Seeder adalah kelas utama di Laravel untuk menjalankan seeder, yang digunakan untuk mengisi database dengan data awal
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * Fungsi ini digunakan untuk memanggil seeder lain yang akan mengisi
     * tabel-tabel dalam database dengan data dummy atau default.
     */

    //public function run(): void biasanya digunakan dalam seeder Laravel untuk memasukkan data ke dalam database secara otomatis
    public function run(): void
    {
        $this->call(TaskListSeeder::class); // Memanggil TaskListSeeder untuk mengisi tabel task_lists
        $this->call(TaskSeeder::class); // Memanggil TaskSeeder untuk mengisi tabel tasks
    }
}