<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\User;

use Illuminate\Http\Request;

class BookReviewController extends Controller {

    // Show a list of all reviews for a book
    public function showAll(Book $book) {
        return view("bookreview.showall", [
            "bookReviews" => BookReview::latest()->where("book_id", $book->id)->paginate(10),
            "book" => $book
        ]);
    }

    // Show a specific review
    public function show(BookReview $bookreview) {
        return view("bookreview.show", [
            "bookreview" => $bookreview,
            "book" => $bookreview->book,
            "user" => $bookreview->user
        ]);
    }

    // Leave a review or edit an existing review
    public function review(Book $book) {
        return view("bookreview.review", [
            "book" => $book,
            "bookreview" => $book->getUsersReview(auth()->id())
        ]);
    }

    // Save review
    public function save(Request $request, Book $book) {
        $formFields =  $request->validate([
            "rating" => "required|integer|min:1|max:10",
            "review" =>  "required"
        ]);

        $bookReview = $book->getUsersReview(auth()->id());

        if (is_null($bookReview)) {
            $formFields["user_id"] = auth()->id();
            $formFields["book_id"] = $book->id;
            $formFields["rating"] = ceil($formFields["rating"]);
            BookReview::create($formFields);
            $book->updateAverageRating();

            return redirect('/book/show/' . $book->id)->with("message", "Your review has been posted.");
        } else {
            $bookReview->update($formFields);
            $book->updateAverageRating();

            return redirect('/book/show/' . $book->id)->with("message", "Your review has been updated.");
        }
    }

    public function remove(Request $request, Book $book) {
        $bookreview = $book->getUsersReview(auth()->id());
        if (is_null($bookreview)) {
            abort(403, "There is no review to delete");
        } else {
            $bookreview->delete();
            $book->updateAverageRating();
            return redirect('/book/show/' . $book->id)->with("message", "Your review has been deleted.");
        }
    }

}
