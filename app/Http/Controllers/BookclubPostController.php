<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookclub;
use App\Models\BookclubPost;
use App\Models\Comment;

class BookclubPostController extends Controller
{
    public function index($id, $bookPostId)
    {
        // —— Check if user is part of bookclub ——
        $user = auth()->user();
        if (!$user->bookclubs->contains($id)) {
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

    public function create($id)
    {
        // —— Check if user is part of bookclub ——
        $user = auth()->user();
        if (!$user->bookclubs->contains($id)) {
            return redirect()->route('bookclubs.post', $id);
        }

        // —— Get the bookclub data ——
        $bookclub = Bookclub::findOrFail($id);

        // —— Get the books data ——
        $books = Book::all();

        return view('bookclub-post-create', [
            'bookclub' => $bookclub,
            'books' => $books
        ]);
    }
    
    // —— Actions ——
    public function store($id)
    {
        $userId = auth()->user()->id;

        $post = new BookclubPost();
        $post->user_id = $userId;
        $post->bookclub_id = $id;
        $post->book_id = request('book_id');
        $post->content = request('content');
        $post->save();

        return redirect()->route('bookclubs.post', [$id, $post->id]);
    }

    public function destroy($id, $bookPostId)
    {
        $post = BookclubPost::findOrFail($bookPostId);

        if (auth()->user()->id !== $post->user_id) {
            return redirect()->route('bookclubs.post', $id);
        }

        $post->delete();

        return redirect()->route('bookclubs.show', $id);
    }
    
    public function comment($id, $bookPostId)
    {
        $userId = auth()->user()->id;

        $comment = new Comment();
        $comment->user_id = $userId;
        $comment->bookclub_posts_id = $bookPostId;
        $comment->content = request('content');
        $comment->save();

        return redirect()->route('bookclubs.post', [$id, $bookPostId]);
    }

    public function commentDelete($id, $bookPostId)
    {
        $commentId = request('commentId');

        $comment = Comment::findOrFail($commentId);

        if (auth()->user()->id !== $comment->user_id) {
            return redirect()->route('bookclubs.post', [$id, $bookPostId]);
        }

        $comment->delete();

        return redirect()->route('bookclubs.post', [$id, $bookPostId]);
    }

}