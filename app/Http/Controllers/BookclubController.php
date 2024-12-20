<?php

namespace App\Http\Controllers;

use App\Models\Bookclub;

class BookclubController extends Controller
{
    public function index(){
        $bookclubs = Bookclub::all();

        return view('bookclubs', [
            'bookclubs' => $bookclubs
        ]);

    }

    public function show($id){
        $bookclub = Bookclub::findOrFail($id);

        return view('bookclub-detail', [
            'bookclub' => $bookclub
        ]);
    }
}