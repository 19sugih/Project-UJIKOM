@extends('layouts.app')

@section('content')
    <div id="content" class="overflow-hidden bg-dark text-white" style="min-height: 100vh; padding: 20px;">
        @if ($lists->isEmpty())
            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh;">
                <p class="fw-bold text-center fs-4">Belum ada tugas yang ditambahkan</p>
                <button type="button" class="btn btn-lg btn-outline-info d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-3"></i> Tambah List
                </button>
            </div>
        @endif

        <div class="d-flex gap-4 px-4 flex-nowrap overflow-auto" style="height: 80vh;">
            @foreach ($lists as $list)
                <div class="card bg-secondary text-dark flex-shrink-0 shadow-lg" style="width: 20rem; max-height: 85vh; border-radius: 15px;">
                    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                        <h4 class="card-title text-center w-100 m-0">{{ $list->name }}</h4>
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0 text-white">
                                <i class="bi bi-trash fs-4"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-3 overflow-auto text-center" style="max-height: 65vh;">
                        @foreach ($list->tasks as $task)
                            <div class="card bg-light text-dark shadow-sm" style="border-radius: 10px;">
                                <div class="card-header bg-secondary text-white d-flex justify-content-between">
                                    <p class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                        {{ $task->name }}
                                    </p>
                                    <span class="badge bg-{{ $task->priorityClass }} text-white">{{ $task->priority }}</span>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $task->description }}</p>
                                </div>
                                @if (!$task->is_completed)
                                    <div class="card-footer text-center">
                                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success w-100 rounded-pill">
                                                <i class="bi bi-check-circle fs-5"></i> Selesai
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-outline-dark rounded-pill" data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <i class="bi bi-plus fs-4"></i> Tambah Tugas
                        </button>
                    </div>
                    <div class="card-footer text-center bg-dark text-white">
                        <p class="card-text m-0">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach

            @if ($lists->isNotEmpty())
                <button type="button" class="btn btn-outline-info flex-shrink-0 rounded-pill shadow-lg" style="width: 20rem; height: fit-content;" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus fs-3"></i> Tambah List
                </button>
            @endif
        </div>
    </div>
@endsection
