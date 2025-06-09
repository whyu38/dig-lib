<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Customer</title>
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
        input.form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.4);
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
        .d-flex {
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="card">
    <h2>Tambah Customer</h2>
    <form action="{{ route('customers.store') }}" method="POST" novalidate>
        @csrf
        <div class="mb-4">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="contoh@email.com" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="08123456789" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('customers.index') }}" class="btn btn-secondary px-4">Kembali</a>
            <button type="submit" class="btn btn-success px-4">Simpan</button>
        </div>
    </form>
</div>
</body>
</html>
