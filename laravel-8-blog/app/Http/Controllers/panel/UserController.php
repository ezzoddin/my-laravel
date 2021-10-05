<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\CreateUserRequest;
use App\Http\Requests\Panel\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make('password');

        User::create($data);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        // route model binding
        return view('panel.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(
            $request->validated()
        );

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
