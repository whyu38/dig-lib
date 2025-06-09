<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Customer;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'customer'])->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::all();
        $customers = Customer::all();
        return view('borrowings.create', compact('books', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrow_code'  => 'required|unique:borrowings,borrow_code',
            'book_id'      => 'required|exists:books,id',
            'customer_id'  => 'required|exists:customers,id',
            'borrow_date'  => 'required|date',
            'return_date'  => 'nullable|date|after_or_equal:borrow_date',
        ]);

        Borrowing::create($request->only('borrow_code', 'book_id', 'customer_id', 'borrow_date', 'return_date'));

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['book', 'customer']);
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        $customers = Customer::all();
        return view('borrowings.edit', compact('borrowing', 'books', 'customers'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'borrow_code'  => 'required|unique:borrowings,borrow_code,' . $borrowing->id,
            'book_id'      => 'required|exists:books,id',
            'customer_id'  => 'required|exists:customers,id',
            'borrow_date'  => 'required|date',
            'return_date'  => 'nullable|date|after_or_equal:borrow_date',
        ]);

        $borrowing->update($request->only('borrow_code', 'book_id', 'customer_id', 'borrow_date', 'return_date'));

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil diupdate.');
    }

    public function destroy(Borrowing $borrowing)
    {
        try {
            $borrowing->delete();
            return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika gagal hapus karena constraint foreign key
            return redirect()->route('borrowings.index')->with('error', 'Data peminjaman gagal dihapus.');
        }
    }
}
