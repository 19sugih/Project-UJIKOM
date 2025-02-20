@extends('layouts.app')

@section('content')
    <!-- Container utama untuk seluruh konten -->
    <!-- overflow-x-auto: Scroll horizontal hanya muncul jika kontennya lebih lebar dari layar -->
    <div id="content" class="overflow-x-auto whitespace-nowrap">

        <!-- Jika belum ada tugas, tampilkan pesan dan tombol tambah tugas -->
        @if ($lists->count() == 0)
            <div class="d-flex flex-column justify-content-center align-items-center text-center"
                style="height: 80vh; width: 100%;">
                <!-- Pesan pemberitahuan bahwa belum ada tugas -->
                <p class="text-dark fst-italic">Belum ada tugas yang ditambahkan</p>
                <!-- Tombol untuk menambah tugas baru -->
                <!-- data-bs-toggle="modal": Membuka modal ketika tombol diklik -->
                <!-- data-bs-target="#addListModal": Menargetkan modal dengan ID "addListModal" -->
                <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2"
                    data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-4"></i>
                </button>
            </div>
        @endif

        @if ($lists->count() !== 0)
            <!-- Row untuk tombol "Tambah Task" dan form pencarian -->
            <!-- align-items-center: Menyamakan tinggi antara tombol dan form pencarian -->
            <div class="row my-1 align-items-center">

                <!-- Kolom untuk form pencarian -->
                <!-- col-3: Lebar kolom 3 dari total 12 grid bootstrap -->
                <div class="col-3 ms-auto"> <!-- ms-auto mendorong kolom ke kanan -->
                    <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                        <!-- Input untuk mengetik kata kunci pencarian -->
                        <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..."
                            value="{{ request()->query('query') }}">

                        <!-- Tombol submit untuk menjalankan pencarian -->
                        <button type="submit" class="btn btn-warning gap-5">Cari</button>
                    </form>
                </div>
            </div>
        @endif
        <!-- Kolom untuk tombol "Tambah Task" -->
        <!-- col-3: Lebar kolom 3 dari total 12 grid bootstrap -->
        <div class="col-3">
            @if ($lists->count() !== 0)
                <button type="button"
                    class="btn btn-primary mb-3 mx-3 w-100 d-flex align-items-center justify-content-center"
                    data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus fs-6 me-2"></i> Tambah Task
                </button>
            @endif
        </div>

        <!-- Container untuk daftar tugas -->
        <!-- flex-nowrap: Supaya semua kartu list tetap dalam satu baris -->
        <!-- overflow-x-auto: Scroll horizontal muncul jika jumlah list melebihi layar -->
        <div class="d-flex gap-3 px-3 flex-wrap overflow-x-auto" style="height: 100vh;">
            @foreach ($lists as $list)
                <div class="card text-white flex-shrink-0 bg-info-subtle border border-waring d-flex flex-column"
                    style="width: 18rem; max-height: 70vh;">

                    <!-- Header Card -->
                    <div class="card-header bg-primary d-flex align-items-center justify-content-between border-0">
                        <h4 class="card-title text-truncate">{{ $list->name }}</h4>
                        <!-- Menampilkan nama list dengan teks yang terpotong jika terlalu panjang -->

                        <!-- Bagian tombol untuk edit dan hapus list -->
                        <div class="d-flex align-items-center gap-2 mx-2">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editListModal"> <!-- Tombol untuk membuka modal edit list -->
                                <i class="bi bi-pencil-square"></i> <!-- Ikon Edit -->
                            </button>

                            <!-- Form untuk menghapus list -->
                            <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn btn-danger">
                                    <i class="bi bi-trash text-light"></i> <!-- Ikon Hapus -->
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Body Card -->
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden style="min-height: 600px;">
                        @foreach ($list->tasks as $task)
                            @if ($task->list_id == $list->id)
                                <!-- Card untuk setiap tugas -->
                                <div class="card bg-white border border-dark style="min-height: 120px; opacity: 0;">
                                    <div class="card-header border-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div
                                                class="d-flex flex-column justify-content-center gap-2 w-100 overflow-hidden">

                                                <!-- Nama tugas, jika selesai maka akan dicoret -->
                                                <a href="{{ route('tasks.show', $task->id) }}"
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }} text-truncate">
                                                    {{ $task->name }}
                                                </a>

                                                <!-- Badge untuk menampilkan prioritas tugas -->
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>

                                            <!-- Form untuk menghapus tugas -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i> <!-- Ikon Hapus -->
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Deskripsi tugas -->
                                    <div class="card-body">
                                        <p class="card-text text-wrap">{{ $task->description }}</p>
                                    </div>

                                    <!-- Jika tugas belum selesai, tampilkan tombol "Selesai" -->
                                    @if (!$task->is_completed)
                                        <div class="card-footer border-2">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i> <!-- Ikon Check -->
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach


                        <!-- Tombol untuk menambahkan tugas baru -->
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i><!-- Ikon Tambah -->
                                Tambah
                            </span>
                        </button>
                    </div>

                    <!-- Footer Card -->
                    <div class="card-footer bg-primary d-flex justify-content-center align-items-center border-0">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                        <!-- Menampilkan jumlah tugas dalam list -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
