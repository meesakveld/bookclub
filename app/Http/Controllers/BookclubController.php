<?php

namespace App\Http\Controllers;

use App\Models\Bookclub;
use App\Models\BookclubPost;
use App\Models\Comment;

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
        $post = BookclubPost::findOrFail($bookPostId)->load('book', 'user', 'bookclub');

        // —— Get the post comments ——
        $comments = Comment::where('bookclub_posts_id', $bookPostId)->with('user')->get();

        return view('bookclub-post-detail', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    // —— Actions ——
    public function join($id){
        $userId = auth()->user()->id;
        $bookclub = Bookclub::findOrFail($id);

        $bookclub->users()->attach($userId);

        return redirect()->route('bookclubs.show', $id);
    }

    public function comment($id, $bookPostId){
        $userId = auth()->user()->id;

        $comment = new Comment();
        $comment->user_id = $userId;
        $comment->bookclub_posts_id = $bookPostId;
        $comment->content = request('content');
        $comment->save();

        return redirect()->route('bookclubs.post', [$id, $bookPostId]);
    }

    // ?commentId=1
    public function commentDelete($id, $bookPostId){
        $commentId = request('commentId');
        
        $comment = Comment::findOrFail($commentId);

        if(auth()->user()->id !== $comment->user_id){
            return redirect()->route('bookclubs.post', [$id, $bookPostId]);
        }

        $comment->delete();

        return redirect()->route('bookclubs.post', [$id, $bookPostId]);
    }
}