<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biodata || Sugih Aldi Setiawan</title>

    <!-- Bootstrap 5 CDN untuk mempercantik tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            /* Styling untuk background halaman */
            overflow: hidden; /* Mencegah scroll */
            background: linear-gradient(120deg, #89f7fe, #66a6ff); /* Gradien warna biru */
            font-family: monospace; /* Font unik */
        }

        /* Styling untuk kartu biodata */
        .card {
            max-width: 650px;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            background: url('{{ asset('assets/images/Bg-Profile-removebg-preview.png') }}');
            border: 2px solid rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1;
            padding: 20px;
        }

        /* Efek hover pada card */
        .card:hover {
            transform: scale(0.98);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        /* Styling untuk gambar profil */
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%; /* Membuat gambar bulat */
            object-fit: cover; /* Menyesuaikan ukuran gambar */
        }

        /* Styling untuk ikon media sosial */
        .social-icons a {
            margin: 0 10px;
            font-size: 20px;
            transition: 0.3s;
            display: inline-block;
        }

        /* Warna ikon media sosial */
        .social-icons a.github {
            color: #6a0dad;
        }

        .social-icons a.instagram {
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
            font-size: 15px;
            padding: 10px;
            transition: background 0.3s ease, transform 0.3s ease;
            border-radius: 5px;
        }

        .social-icons a.whatsapp {
            color: #25D366;
        }

        /* Efek hover ikon media sosial */
        .social-icons a:hover {
            transform: scale(1.2);
        }

        .social-icons a.github:hover {
            color: #8a2be2;
        }

        .social-icons a.instagram:hover {
            background: linear-gradient(45deg, #ff4b2b, #ff416c);
        }

        .social-icons a.whatsapp:hover {
            color: #128C7E;
        }

        /* Styling untuk teks */
        h3, h5, p {
            color: #ffffff;
        }

        /* Styling untuk tombol kembali */
        .back-button {
            font-size: 24px;
            color: #fffbfb;
            text-decoration: none;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        /* Efek hover tombol kembali */
        .back-button:hover {
            color: #827c7c;
        }

        /* Animasi ikon panah */
        .back-button i {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        /* Animasi ikon panah */
        .back-button:hover i {
            transform: rotate(-180deg); /* Memutar ikon panah */
        }

        /* Styling header kartu */
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <!-- Kartu utama -->
        <div class="card p-4 text-center bg-dark mt-3">

             <!-- Tombol kembali -->
            <a href="{{ route('home') }}" class="back-button">
                <i class="bi bi-arrow-left-circle fs-4"></i> Kembali
            </a>

            <!-- Gambar profil -->
            <img src="assets/images/met.png" alt="Foto Profil" class="profile-img mx-auto mb-3">

            <!-- Emoji -->
            <h6> 😎 </h6>

            <!-- Nama dan deskripsi -->
            <h3 class="mb-1">Sugih Aldi Setiawan</h3>
            <p>~Taruna RPL SMKN 2 SUBANG</p>

            <hr> <!-- Garis pemisah -->

            <!-- Bagian Biodata -->
            <h5>Biodata Saya</h5>
            <ul class="list-group list-group-flush text-start bg-secondary">
                <li class="list-group-item"><strong>Nama:</strong> Sugih Aldi Setiawan</li>
                <li class="list-group-item"><strong>Tempat, Tanggal Lahir:</strong> Subang, 19 April 2007</li>
                <li class="list-group-item"><strong>Alamat:</strong> Perum Griya Pesona Praja(GPP), RT22 / RW06, Block C11 No.45</li>
                <li class="list-group-item"><strong>Hobi:</strong> Olahraga, Sholat, Menyanyi, Menonton</li>
                <li class="list-group-item"><strong>Cita-cita:</strong> Ingin Menjadi Bintara Brimob (▀̿Ĺ̯▀̿ ̿) 🔥</li>
            </ul>

            <!-- Bagian Media Sosial -->
            <h5>Media Sosial Saya</h5>
            <div class="social-icons">
                <a href="https://github.com/19sugih" class="github">
                    <i class="bi bi-github"></i> <!-- Link ke GitHub -->
                </a>
                <a href="https://www.instagram.com/gihhaldi27" class="instagram">
                    <i class="bi bi-instagram"></i> <!-- Link ke Instagram -->
                </a>
                <a href="https://wa.me/6281320839257" class="whatsapp">
                    <i class="bi bi-whatsapp"></i> <!-- Link ke Whatsapp -->
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
