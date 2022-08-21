<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title", "author", "description", "cover", "average_rating"];

    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function bookreviews() {
        return $this->hasMany(BookReview::class, "book_id");
    }

    public function getUsersReview($user_id) {
        $reviews = BookReview::where("user_id", $user_id)->where("book_id", $this->id)->get();
        return count($reviews) > 0 ? $reviews[0] : null;
    }

    // TODO: This should be a routine that is run on book.rating update
    public function updateAverageRating() {
        $average_rating = $this->bookreviews()->avg("rating");
        $this->average_rating = $average_rating;
        $this->save();
    }
}
