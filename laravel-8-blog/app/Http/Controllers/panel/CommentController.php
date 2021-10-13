<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        return view('panel.comments.index');
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
