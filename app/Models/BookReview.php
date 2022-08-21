<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    protected $fillable = ["review", "rating", "book_id", "user_id"];

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function book() {
        return $this->belongsTo(Book::Class, "book_id");
    }

}
