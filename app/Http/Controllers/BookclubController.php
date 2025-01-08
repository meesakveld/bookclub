<?php

namespace App\Http\Controllers;

use App\Models\Bookclub;
use App\Models\BookclubPost;

class BookclubController extends Controller
{
    public function index(){
        $bookclubs = Bookclub::all();

        return view('bookclubs', [
            'bookclubs' => $bookclubs
        ]);

    }

    public function show($id){
        // —— Check if user is part of bookclub ——
        $user = auth()->user();
        if(!$user->bookclubs->contains($id)){
            return redirect()->route('bookclubs');
        }

        // —— Get bookclub ——
        $bookclub = Bookclub::findOrFail($id);

        // —— Get bookclub posts with book_id and user_id data ——
        $posts = BookclubPost::where('bookclub_id', $id)->with('book', 'user')->get();

        return view('bookclub-detail', [
            'bookclub' => $bookclub,
            'posts' => $posts
        ]);
    }

    public function post($id, $bookPostId){
        // —— Check if user is part of bookclub ——
        $user = auth()->user();
        if(!$user->bookclubs->contains($id)){
            return redirect()->route('bookclubs');
        }

        // —— Get the post data ——
        $post = BookclubPost::findOrFail($bookPostId)->load('book', 'user');

        // —— Get the post comments ——

        return view('bookclub-post-detail', [
            'post' => $post
        ]);
    }

    // —— Actions ——
    public function join($id){
        $userId = auth()->user()->id;
        $bookclub = Bookclub::findOrFail($id);

        $bookclub->users()->attach($userId);

        return redirect()->route('bookclubs.show', $id);
    }
}