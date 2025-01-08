<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookclubPost extends Model
{
    use HasFactory;

    protected $fillable = [
        "content",   
        "bookclub_id",
        "user_id",
        "book_id",
    ];

    public function bookclub() {
        return $this->belongsTo(Bookclub::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

}