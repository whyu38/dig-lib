<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg,rgb(235, 49, 225) 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 480px;
            background: #fff;
            padding: 30px;
        }
        h2 {
            color: #333;
            margin-bottom: 25px;
            font-weight: 700;
            text-align: center;
        }
        label {
            font-weight: 600;
            color: #555;
        }
        .btn-success {
            background: #2575fc;
            border: none;
            transition: background 0.3s ease;
        }
        .btn-success:hover {
            background: #1a52d1;
        }
        .btn-secondary {
            transition: background 0.3s ease;
        }
        .btn-secondary:hover {
            background: #6c757d;
            color: #fff;
        }
        input.form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.4);
        }
    </style>
</head>
<body>
<div class="card">
    <h2>Tambah Buku</h2>
    <form action="{{ route('books.store') }}" method="POST" novalidate>
        @csrf
        <div class="mb-4">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul buku" required>
        </div>
        <div class="mb-4">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="Masukkan nama penulis" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control" placeholder="Jumlah stok buku" min="0" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('books.index') }}" class="btn btn-secondary px-4">Kembali</a>
            <button type="submit" class="btn btn-success px-4">Simpan</button>
        </div>
    </form>
</div>
</body>
</html>
