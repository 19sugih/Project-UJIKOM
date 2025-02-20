<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//class Controller extends BaseController adalah kelas dasar dalam Laravel yang digunakan untuk membuat controller, yang menangani logika aplikasi dan menghubungkan model dengan view.
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests; //AuthorizesRequests → Mengelola otorisasi pengguna. || ValidatesRequests → Memvalidasi data yang dikirim ke controller
}