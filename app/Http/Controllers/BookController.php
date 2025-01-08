<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $page = request('page') ?? 1;
        $perPage = request('per_page') ?? 12;
        $search = request('search');

        $books = Book::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%$search%");
            });

        $bookPerPage = $books->get()->skip(($page - 1) * $perPage)->take($perPage);
        $totalBooks = $books->get()->count();

        return view('books', [
            'books' => $bookPerPage,
            'page' => $page,
            'per_page' => $perPage,
            'total_books' => $totalBooks,
            'search' => $search
        ]);

    }

    // —— API ——
    public function all()
    {
        $books = Book::all();

        return response()->json($books);
    }

}