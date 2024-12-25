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
        $user = auth()->user();
        if(!$user->bookclubs->contains($id)){
            return redirect()->route('bookclubs');
        }

        $bookclub = Bookclub::findOrFail($id);

        return view('bookclub-detail', [
            'bookclub' => $bookclub
        ]);
    }

    // —— Actions ——
    public function join($bookclub){
        $user = auth()->user();
        $user->bookclubs()->attach($bookclub);

        return redirect()->route('bookclubs');
    }
}