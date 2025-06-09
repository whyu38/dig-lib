<!DOCTYPE html>
<html>
<head>
    <title>Data Customer</title>
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
                    <a class="nav-link" href="{{ url('/books') }}">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/customers') }}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/borrowings') }}">Peminjaman</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daftar Customer</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Customer</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $cust)
            <tr>
                <td>{{ $cust->name }}</td>
                <td>{{ $cust->email }}</td>
                <td>{{ $cust->phone }}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#viewModal{{ $cust->id }}">
                        <i class="bi bi-eye"></i>
                    </button>

                    <a href="{{ route('customers.edit', $cust->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form id="delete-form-{{ $cust->id }}" action="{{ route('customers.destroy', $cust->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $cust->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>

            <div class="modal fade" id="viewModal{{ $cust->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $cust->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel{{ $cust->id }}">Detail Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Nama:</strong> {{ $cust->name }}</p>
                    <p><strong>Email:</strong> {{ $cust->email }}</p>
                    <p><strong>Telepon:</strong> {{ $cust->phone }}</p>
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
        {{ $customers->links('pagination::bootstrap-5') }}
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
            const custId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Customer akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + custId).submit();
                }
            });
        });
    });
</script>

</body>
</html>
