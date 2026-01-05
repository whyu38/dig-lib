<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
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
        <h2 class="mb-0">Daftar Buku</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>

    <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>
                <a href="{{ route('books.index', ['sort' => 'title', 'direction' => ($sortField == 'title' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}" class="text-white text-decoration-none">
                    Judul
                    @if($sortField == 'title')
                        <i class="bi bi-caret-{{ $sortDirection == 'asc' ? 'up' : 'down' }}-fill"></i>
                    @endif
                </a>
            </th>
            <th>
                <a href="{{ route('books.index', ['sort' => 'author', 'direction' => ($sortField == 'author' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}" class="text-white text-decoration-none">
                    Penulis
                    @if($sortField == 'author')
                        <i class="bi bi-caret-{{ $sortDirection == 'asc' ? 'up' : 'down' }}-fill"></i>
                    @endif
                </a>
            </th>
            <th>
                <a href="{{ route('books.index', ['sort' => 'stock', 'direction' => ($sortField == 'stock' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}" class="text-white text-decoration-none">
                    Stok
                    @if($sortField == 'stock')
                        <i class="bi bi-caret-{{ $sortDirection == 'asc' ? 'up' : 'down' }}-fill"></i>
                    @endif
                </a>
            </th>
            <th style="width: 200px;">Aksi</th>
        </tr>
    </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->stock }}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewModal{{ $book->id }}">
                        <i class="bi bi-eye"></i>
                    </button>

                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $book->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <div class="modal fade" id="viewModal{{ $book->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $book->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel{{ $book->id }}">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Judul:</strong> {{ $book->title }}</p>
                    <p><strong>Penulis:</strong> {{ $book->author }}</p>
                    <p><strong>Stok:</strong> {{ $book->stock }}</p>
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
        {{ $books->links('pagination::bootstrap-5') }}
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
            const bookId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data buku akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + bookId).submit();
                }
            });
        });
    });
</script>

</body>
</html>
