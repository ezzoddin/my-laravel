<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::paginate(3);
        return view('todos.index', compact('todos'));
    }


    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

}
