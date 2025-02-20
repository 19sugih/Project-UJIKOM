<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Membuat kelas migrasi untuk tabel 'sessions'
return new class extends Migration
{
    /**
     * Jalankan migrasi (membuat tabel sessions).
     */
    public function up(): void
    {
        // Membuat tabel 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            //Membuat kolom id bertipe string sebagai primary key || //Primary Key adalah kolom unik dalam tabel yang digunakan untuk mengidentifikasi setiap baris data secara unik.
            $table->string('id')->primary(); // Primary key dengan tipe string

            //Membuat kolom user_id sebagai foreign key yang opsional dan diindeks untuk pencarian lebih cepa
            $table->foreignId('user_id')->nullable()->index(); // ID pengguna (opsional) dengan index untuk mempercepat pencarian

            //Membuat kolom ip_address dengan panjang maksimal 45 karakter dan opsional
            $table->string('ip_address', 45)->nullable(); // Alamat IP pengguna (maksimal 45 karakter, opsional)

            //Membuat kolom user_agent dengan panjang maksimal 120 karakter dan opsional
            $table->text('user_agent')->nullable(); // Informasi user agent (opsional)

            //payload menyimpan data dalam jumlah besar
            $table->longText('payload'); // Data sesi yang disimpan

            //Membuat kolom last_activity sebagai integer dan diindeks untuk pencarian cepat
            $table->integer('last_activity')->index(); // Waktu aktivitas terakhir dengan index untuk pencarian cepat
        });
    }

    /**
     * Batalkan migrasi (menghapus tabel sessions).
     */

    //public function down(): void adalah fungsi dalam Laravel migration yang digunakan untuk membatalkan perubahan yang dibuat oleh fungsi up(). Biasanya, ini berisi perintah untuk menghapus tabel atau membatalkan perubahan skema database
    public function down(): void
    {   
        //Digunakan dalam rollback untuk menghapus tabel agar tidak terjadi error jika tabel tidak ditemukan
        Schema::dropIfExists('sessions'); // Hapus tabel 'sessions' jika rollback dilakukan
    }
};