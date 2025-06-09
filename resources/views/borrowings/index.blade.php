<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 px-4 py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Perpustakaan</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('books') ? 'active fw-bold' : '' }}" href="{{ url('/books') }}">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('customers') ? 'active fw-bold' : '' }}" href="{{ url('/customers') }}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('borrowings') ? 'active fw-bold' : '' }}" href="{{ url('/borrowings') }}">Peminjaman</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Data Peminjaman</h2>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kode</th>
                <th>Buku</th>
                <th>Customer</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->borrow_code }}</td>
                <td>{{ $borrowing->book->title }}</td>
                <td>{{ $borrowing->customer->name }}</td>
                <td>{{ $borrowing->borrow_date }}</td>
                <td>{{ $borrowing->return_date ?? '-' }}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewModal{{ $borrowing->id }}">
                        <i class="bi bi-eye"></i>
                    </button>

                    <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form id="delete-form-{{ $borrowing->id }}" action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $borrowing->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <div class="modal fade" id="viewModal{{ $borrowing->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $borrowing->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel{{ $borrowing->id }}">Detail Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Kode:</strong> {{ $borrowing->borrow_code }}</p>
                    <p><strong>Buku:</strong> {{ $borrowing->book->title }}</p>
                    <p><strong>Customer:</strong> {{ $borrowing->customer->name }}</p>
                    <p><strong>Tanggal Pinjam:</strong> {{ $borrowing->borrow_date }}</p>
                    <p><strong>Tanggal Kembali:</strong> {{ $borrowing->return_date ?? '-' }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $borrowings->links('pagination::bootstrap-5') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            timer: 2500,
            showConfirmButton: false,
        });
    @endif

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const borrowingId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data peminjaman akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + borrowingId).submit();
                }
            });
        });
    });
</script>

</body>
</html>
