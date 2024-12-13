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
}