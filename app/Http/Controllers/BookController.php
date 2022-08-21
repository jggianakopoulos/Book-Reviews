<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class BookController extends Controller
{
    public function index() {
        return view('book.index', [
            'books' => Book::latest()->filter(request(['search']))->paginate(16)
        ]);
    }

    public function show(Book $book) {
        return view('book.show', [
            'book' => $book,
            'bookreview' => $book->getUsersReview(auth()->id())
        ]);
    }

    public function add() {
        return view('book.add');
    }

    public function save(Request $request) {
        $formFields = $request->validate([
            "title" => "required",
            "author" => "required",
            "description" => ""
        ]);

        if($request->hasFile('cover')) {
            $formFields['cover'] = $request->file('cover')->store('cover', 'public');
        }

        Book::create($formFields);

        return redirect('/')->with("message", "Book created successfully.");
    }
}
