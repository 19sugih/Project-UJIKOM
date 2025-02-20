<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat kelas anonim untuk migrasi database
return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */

    //public function up(): void adalah fungsi dalam Laravel migration yang digunakan untuk menjalankan perubahan pada database, seperti membuat atau mengubah tabel.
    public function up(): void
    {
        // Membuat tabel 'task_lists'
        Schema::create('task_lists', function (Blueprint $table) {

            //ID adalah kolom unik (primary key) yang otomatis bertambah untuk mengidentifikasi setiap baris data
            $table->id(); // Membuat kolom 'id' sebagai primary key dengan tipe data bigint auto-increment

            //String menyimpan teks, seperti nama, deskripsi, atau alamat, dengan panjang yang dapat ditentukan
            $table->string('name')->unique(); // Membuat kolom 'name' dengan tipe string dan harus unik

            //Digunakan untuk mencatat created_at (waktu dibuat) dan updated_at (waktu diperbarui)
            $table->timestamps(); // Membuat dua kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Membatalkan migrasi.
     */

    //public function down(): void adalah fungsi dalam Laravel migration yang digunakan untuk membatalkan perubahan yang dibuat oleh fungsi up(). Biasanya, ini berisi perintah untuk menghapus tabel atau membatalkan perubahan skema database
    public function down(): void
    {
        // Menghapus tabel 'task_lists' jika rollback dilakukan
        Schema::dropIfExists('task_lists'); //Digunakan dalam rollback untuk menghapus tabel agar tidak terjadi error jika tabel tidak ditemukan
    }
};