<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Morilog\Jalali\Jalalian;

use SweetAlert;

class TodoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $todos = auth()->user()->todos()->latest()->paginate(3);

        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo)
    {
        Gate::authorize('view', $todo);

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

        $todo = new Todo;


        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);

        alert()->success('تسک با موفقیت انجام شد.', 'با تشکر');
        return redirect()->route('todos.index');

    }

    public function edit(Todo $todo)
    {

        Gate::authorize('update', $todo);

        return view('todos.edit', compact('todo'));

    }

    public function update(Request $request, Todo $todo)
    {

        Gate::authorize('update', $todo);


        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        alert()->success('تسک با موفقیت ویرایش شد.', 'با تشکر');
        return redirect()->route('todos.index');

    }

    public function destroy(Todo $todo)
    {
        Gate::authorize('delete', $todo);

        $todo->delete();
        alert()->error('تسک با موفقیت حذف شد.', 'دقت کنید');
        return redirect()->route('todos.index');

    }

    public function complete(Todo $todo)
    {
        Gate::authorize('complete', $todo);

        $todo->update([
            'completed' => 1
        ]);

         alert()->success('تسک مورد نظر به وضعیت انجام شد تغییر پیدا کرد.', 'با تشکر');
        return redirect()->route('todos.index');

    }

}
