<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'body' => 'required|max:255',
            'book_id' => 'required'
        ]);

        $comment = Comment::create([
            'body' => $inputs['body'],
            'user_id' => auth()->user()->id,
            'book_id' => $inputs['book_id']
        ]);

        // 保存したコメントをJSONとして返す
        return response()->json($comment);
    }
}
