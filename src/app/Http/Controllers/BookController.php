<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tag;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request, Book $book)
    {
        $user = auth()->user();

        $search = $request->input('search');
        $query = Book::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $books = $query->orderByDesc('created_at')->paginate(8);
        return view('book.index', compact('books', 'user', 'search'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('book.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $inputs=$request->validate([
            'title'=>'required|max:100',
            'description'=>'required|max:1000',
            'tags' => 'array',
        ]);
        $book = new Book();
        $book->title=$inputs['title'];
        $book->description=$inputs['description'];
        $book->url = $request->url;
        $book->tag_id = $request->tag_id;
        $book->user_id = auth()->user()->id;
        if (request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            request()->file('image')->move('storage/images', $name);
            $book->image = $name;
        }
        $book->save();
        return redirect()->route('book.index')->with('message', '投稿しました');
    }

    public function show(Book $book)
    {
        $user = auth()->user();

        $bookmark = Bookmark::where('book_id', $book->id)->where('user_id', auth()->user()->id)->first();

        return view('book.show', compact('book', 'user', 'bookmark'));
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $inputs=$request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000'
        ]);

        $book->title=$inputs['title'];
        $book->description=$inputs['description'];

        if(request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            $file=request()->file('image')->move('storage/images', $name);
            $book->image = $name;
        }

        $book->save();

        return redirect()->route('book.show', $book)->with('message', '投稿を更新しました');
    }

    public function destroy(Book $book)
    {
        $book->comments()->delete();
        $book->delete();
        return redirect()->route('book.index')->with('message', '投稿を削除しました');
    }
}
