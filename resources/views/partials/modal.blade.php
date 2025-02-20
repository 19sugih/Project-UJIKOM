<!-- Modal untuk menambah list -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <!-- Dialog untuk modal -->
    <div class="modal-dialog">
        <!-- Form untuk mengirim data list -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Menyertakan metode POST dalam form -->
            @csrf <!-- Menyertakan token CSRF untuk perlindungan -->
            <!-- Bagian header modal -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1> <!-- Judul modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Tombol untuk menutup modal -->
            </div>
            <!-- Bagian body modal -->
            <div class="modal-body">
                <div class="mb-3"> <!-- Container untuk input nama list -->
                    <label for="name" class="form-label">Nama</label> <!-- Label untuk input -->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list"> <!-- Input untuk nama list -->
                </div>
            </div>
            <!-- Bagian footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol batal -->
                <button type="submit" class="btn btn-primary">Tambah</button>
                <!-- Tombol submit untuk menambah list -->
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk menambah task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <!-- Dialog untuk modal -->
    <div class="modal-dialog">
        <!-- Form untuk mengirim data task -->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Menyertakan metode POST dalam form -->
            @csrf <!-- Menyertakan token CSRF untuk perlindungan -->
            <!-- Bagian header modal -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1> <!-- Judul modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- Tombol untuk menutup modal -->
            </div>
            <!-- Bagian body modal -->
            <div class="modal-body">
                <input type="text" id="taskListId" name="list_id" hidden>
                <!-- Menyembunyikan ID list yang dipilih -->
                <div class="mb-3"> <!-- Container untuk input nama task -->
                    <label for="name" class="form-label">Nama</label> <!-- Label untuk input -->
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list"> <!-- Input untuk nama task -->
                </div>
                <div class="mb-3"> <!-- Container untuk input deskripsi task -->
                    <label for="description" class="form-label">Deskripsi</label> <!-- Label untuk input -->
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi"></textarea> <!-- Input untuk deskripsi task -->
                </div>
                <div class="mb-3"> <!-- Container untuk input prioritas task -->
                    <label for="priority" class="form-label">Priority</label> <!-- Label untuk input -->
                    <select class="form-control" name="priority" id="priority">
                        <!-- Dropdown untuk memilih prioritas -->
                        <option value="low">Low</option> <!-- Pilihan prioritas rendah -->
                        <option value="medium">Medium</option> <!-- Pilihan prioritas sedang -->
                        <option value="high">High</option> <!-- Pilihan prioritas tinggi -->
                    </select>
                </div>
            </div>
            <!-- Bagian footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol batal -->
                <button type="submit" class="btn btn-primary">Tambah</button>
                <!-- Tombol submit untuk menambah task -->
            </div>
        </form>
    </div>
</div>

@if ($lists->count() > 0)
    <!-- Modal untuk mengedit list -->
    <div class="modal fade" id="editListModal" tabindex="-1" aria-labelledby="editListModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <!-- Form untuk mengedit list -->
            <form action="{{ route('lists.update', $list->id) }}" method="POST" class="modal-content">
                @method('PUT') <!-- Menggunakan metode PUT untuk update data -->
                @csrf <!-- Token CSRF untuk keamanan -->

                <!-- Header Modal -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editListModalLabel">Edit List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $list->name }}" placeholder="Masukkan nama list"> <!-- Pengguna dapat mengedit nama list yang sudah ada -->
                    </div>
                </div>

                <!-- Footer Modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <!-- Menutup modal tanpa menyimpan perubahan -->
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <!-- Menyimpan perubahan yang dilakukan pengguna dan memperbarui list -->
                        </div>
            </form>
        </div>
    </div>
@endif
