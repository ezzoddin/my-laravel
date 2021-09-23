<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::latest()->paginate(3);
        return view('todos.index', compact('todos'));
    }


    public function show(Todo $todo)
    {

        return view('todos.show', compact('todo'));
    }

    public function create()
    {

        return view('todos.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        alert()->success('تسک با موفقیت انجام شد.', 'با تشکر');
        return redirect()->route('todos.index');

    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));

    }


    public function update(Request $request, Todo $todo)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Todo::updated([
            'title' => $request->title,
            'description' => $request->description
        ]);

        alert()->success('تسک با موفقیت ویرایش شد.', 'با تشکر');
        return redirect()->route('todos.index');

    }

}
