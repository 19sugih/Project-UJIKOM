<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Mendefinisikan perintah artisan custom 'inspire'
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote()); // Menampilkan kutipan inspiratif dari Laravel
})->purpose('Display an inspiring quote') // Menentukan tujuan dari perintah ini
    ->hourly(); // Menjadwalkan perintah agar berjalan setiap jam