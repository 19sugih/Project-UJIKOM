<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat kelas migrasi untuk tabel 'tasks'
return new class extends Migration
{
    /**
     * Jalankan migrasi (membuat tabel).
     */

    //public function up(): void adalah fungsi dalam Laravel migration yang digunakan untuk menjalankan perubahan pada database, seperti membuat atau mengubah tabel.
    public function up(): void
    {
        // Membuat tabel 'tasks'
        Schema::create('tasks', function (Blueprint $table) {
            //ID adalah kolom unik (primary key) yang otomatis bertambah untuk mengidentifikasi setiap baris data.
            $table->id(); // Primary key (bigint, auto-increment)

            //String menyimpan teks, seperti nama, deskripsi, atau alamat, dengan panjang yang dapat ditentukan.
            $table->string('name'); // Nama tugas (wajib diisi)
            $table->string('description')->nullable(); // Deskripsi tugas (opsional)

            //Boolean adalah tipe data dengan dua nilai: true atau false, sering digunakan untuk status atau kondisi dalam database.
            $table->boolean('is_completed')->default(false); // Status tugas (default: belum selesai)

            //Enum digunakan untuk membatasi nilai kolom hanya pada opsi tertentu, seperti low, medium, high.
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Prioritas tugas

            //Digunakan untuk mencatat created_at (waktu dibuat) dan updated_at (waktu diperbarui).
            $table->timestamps(); // Kolom created_at dan updated_at

            // Relasi ke tabel 'task_lists' dengan foreign key 'list_id'
            // Jika task_list dihapus, semua tugas terkait juga terhapus (cascade)
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade'); //Digunakan untuk membuat relasi antar tabel dalam database.
        });
    }

    /**
     * Batalkan migrasi (menghapus tabel).
     */

    //public function down(): void adalah fungsi dalam Laravel migration yang digunakan untuk membatalkan perubahan yang dibuat oleh fungsi up(). Biasanya, ini berisi perintah untuk menghapus tabel atau membatalkan perubahan skema database
    public function down(): void
    {
        //Digunakan dalam rollback untuk menghapus tabel agar tidak terjadi error jika tabel tidak ditemukan
        Schema::dropIfExists('tasks'); // Hapus tabel 'tasks' jika rollback dilakukan
    }
};