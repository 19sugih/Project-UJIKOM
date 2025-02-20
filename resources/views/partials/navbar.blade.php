<nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Todo-App di sebelah kiri -->
        <a class="navbar-brand fw-bolder" href="#">{{ config('app.name') }}</a>
        <!-- Menampilkan nama aplikasi yang dikonfigurasi di `config/app.php` -->

        <!-- Profile di sebelah kanan -->
        <div class="d-flex align-items-center">
            <a href="{{ route('profil') }}" class="nav-link text-light d-flex align-items-center">
                <i class="bi bi-person-circle me-2"></i> Profile
            </a> <!-- Mengarahkan pengguna ke halaman profil -->
        </div>
    </div>
</nav>
