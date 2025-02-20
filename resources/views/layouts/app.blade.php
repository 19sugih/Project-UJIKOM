<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Menentukan encoding karakter untuk dokumen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur tampilan agar responsif di perangkat mobile -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Memastikan kompatibilitas dengan Internet Explorer -->

    <title>{{ $title }} - {{ config('app.name') }}</title>
    <!-- Menentukan judul halaman dengan variabel dinamis dari Laravel -->

    <!-- Mengimpor bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <style>
        body {
            /* Mengatur background dengan efek gradasi */
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            /* 120deg: Arah gradasi miring dari kiri atas ke kanan bawah */
            /* #89f7fe: Warna biru muda sebagai titik awal gradasi */
            /* #66a6ff: Warna biru lebih gelap sebagai titik akhir gradasi */
            font-family: monospace; /* Mengatur jenis font agar semua teks dalam halaman menggunakan monospace */
        }

        /* Menambahkan gambar latar belakang dengan efek blur */
        body::before {
            content: ""; /* Elemen kosong yang akan digunakan sebagai latar belakang */
            position: fixed;  /* Mengatur posisi elemen agar tetap di tempatnya dan tidak bergeser */
             /* Menempatkan elemen di pojok kiri atas */
            top: 0;
            left: 0;
            /* Memastikan elemen menutupi seluruh halaman */
            width: 100%;
            height: 100%;
            filter: blur(5px);/* Menambahkan efek blur pada elemen latar belakang */
            z-index: -1;  /* Menempatkan elemen ini di bawah semua elemen lain agar tidak mengganggu konten utama */
        }

        /* Menambahkan lapisan transparan di atas gambar latar belakang */
        body::after¿ {
            content: ""; /* Membuat elemen pseudo yang tidak memiliki konten, hanya digunakan sebagai layer tambahan */
            position: fixed; /* Memastikan elemen ini tetap berada di tempatnya, tidak bergeser saat di-scroll */
            /* Menempatkan elemen di pojok kiri atas halaman */
            top: 0;
            left: 0;
            /* Memastikan elemen menutupi seluruh layar */
            width: 100%;
            height: 100%;
            /* Menambahkan overlay warna hitam dengan transparansi 40% */
            background: rgba(0, 0, 0, 0.4);
            /* Efek transparan */
            z-index: -1;
        }

        /* Menyesuaikan ukuran dan tampilan kartu kecil */
        .small-card {
            width: 18rem;
            /* Lebar lebih kecil */
            max-height: 70vh;
            /* Tinggi lebih kecil */
            border-radius: 15px;
            /* Border lebih kecil */
            font-size: 0.85rem;
            /* Ukuran teks lebih kecil */
            padding: 8px;
            /* Padding lebih kecil */
        }

        /* Mengatur tampilan header kartu kecil */
        .small-card .card-header {
            padding: 6px;
            /* Kurangi padding header */
            font-size: 0.8rem;
            /* Ukuran font header lebih kecil */
        }

        /* Mengatur tampilan body kartu kecil */
        .small-card .card-body {
            padding: 6px;
            /* Kurangi padding body */
        }

        /* Mengatur tampilan footer kartu kecil */
        .small-card .card-footer {
            padding: 6px;
            /* Kurangi padding footer */
        }

        /* Menyesuaikan ukuran tombol dalam kartu kecil */
        .small-card .btn {
            font-size: 0.75rem;
            /* Perkecil tombol */
            padding: 4px 6px;
            /* Kurangi padding tombol */
        }
    </style>




</head>

<body> 

    @yield('content') <!-- Bagian untuk menampilkan konten halaman yang diisi oleh template lain -->
    @include('partials.navbar') <!-- Memasukkan navbar dari file partials/navbar.blade.php -->


    @include('partials.modal') <!-- Memasukkan modal dari file partials/modal.blade.php -->

    <script src="{{ asset('js/script.js') }}"></script> <!-- Menghubungkan ke file JavaScript eksternal -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Mengimpor JavaScript Bootstrap -->
</body>

</html>
