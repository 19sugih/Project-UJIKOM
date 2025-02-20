@extends('layouts.app')

@section('content')
    <!-- Container utama untuk tampilan halaman -->
    <div id="content" class="container">
        <!-- Tombol kembali ke halaman utama -->
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-arrow-left-short fs-4 text-white"> Kembali </i> <!-- Icon panah kiri -->
            </a>
        </div>

        <!-- Menampilkan pesan sukses jika ada -->
        @session('success')
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success') }} <!-- Menampilkan pesan sukses dari session -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="row my-3">
            <!-- Kolom kiri untuk tampilan utama tugas -->
            <div class="col-8">
                <div class="card" style="height: 80vh;">
                    <!-- Header kartu tugas -->
                    <div class="card-header d-flex bg-info-subtle align-items-center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                            {{ $task->name }} <!-- Menampilkan nama tugas -->
                            <span class="fs-6 fw-medium">di {{ $task->list->name }}</span> <!-- Menampilkan nama list -->
                        </h3>
                        <!-- Tombol edit tugas -->
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <!-- Deskripsi tugas -->
                    <div class="card-body bg-white">
                        <p>{{ $task->description }}</p>
                    </div>
                    <!-- Footer kartu dengan tombol hapus tugas -->
                    <div class="card-footer">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Kolom kanan untuk detail tugas -->
            <div class="col-4">
                <div class="card" style="height: 80vh;">
                    <div class="card-header d-flex bg-info-subtle align-items-center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <!-- Form untuk mengganti list tugas -->
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        <!-- Menampilkan prioritas tugas -->
                        <h6 class="fs-6">
                            Priotitas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                                {{ $task->priority }}
                            </span>
                        </h6>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk mengedit tugas -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{ $task->list_id }}" name="list_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $task->name }}" placeholder="Masukkan nama list">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-control" name="priority" id="priority">
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
