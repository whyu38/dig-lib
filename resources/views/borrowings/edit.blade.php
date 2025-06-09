<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Peminjaman</title>
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
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 520px;
        }
        h2 {
            text-align: center;
            color: #333;
            font-weight: 700;
            margin-bottom: 25px;
        }
        label {
            font-weight: 600;
            color: #555;
        }
        input.form-control:focus, select.form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.4);
        }
        .btn-primary {
            background: #2575fc;
            border: none;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
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
    <h2>Edit Peminjaman</h2>
    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="borrow_code" class="form-label">Kode Pinjam</label>
            <input type="text" name="borrow_code" id="borrow_code" class="form-control" value="{{ $borrowing->borrow_code }}" required>
        </div>
        <div class="mb-4">
            <label for="book_id" class="form-label">Buku</label>
            <select name="book_id" id="book_id" class="form-control" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $book->id == $borrowing->book_id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                @foreach($customers as $cust)
                    <option value="{{ $cust->id }}" {{ $cust->id == $borrowing->customer_id ? 'selected' : '' }}>
                        {{ $cust->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrowing->borrow_date }}" required>
        </div>
        <div class="mb-4">
            <label for="return_date" class="form-label">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrowing->return_date }}">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary px-4">Kembali</a>
            <button type="submit" class="btn btn-primary px-4">Update</button>
        </div>
    </form>
</div>
</body>
</html>
