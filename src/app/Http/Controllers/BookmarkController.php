<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark(Book $book, Request $request)
    {
        $bookmark = new Bookmark();
        $bookmark->book_id = $book->id;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->save();
        return back();
    }

    public function unbookmark(Book $book, Request $request)
    {
        $user = Auth::user()->id;
        $bookmark = Bookmark::where('book_id', $book->id)->where('user_id', $user)->first();
        $bookmark->delete();
        return back();
    }
}
