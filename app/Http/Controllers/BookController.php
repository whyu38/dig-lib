<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($request->only('title', 'author', 'stock'));

        return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($request->only('title', 'author', 'stock'));

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diupdate.');
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Data buku berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika gagal hapus karena constraint foreign key
            return redirect()->route('books.index')->with('error', 'Data buku gagal dihapus karena masih digunakan di data lain.');
        }
    }
}
