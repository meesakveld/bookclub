<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $page = request('page') ?? 1;
        $perPage = request('per_page') ?? 12;

        $books = Book::skip(($page - 1) * $perPage)->take($perPage)->get();

        return view('books', [
            'books' => $books,
            'page' => $page,
            'per_page' => $perPage,
            'total_books' => Book::count()
        ]);

    }

}