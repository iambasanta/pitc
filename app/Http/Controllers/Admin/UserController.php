<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    protected $limit = 5;
    public function index()
    {
        $users = User::orderBy('name')->paginate($this->limit);
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $user = new User();
        $roles = Role::all();
        return view('admin.users.create',compact('user','roles'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->attachRole($request->role);

        return redirect()->route('admin.users.index')->with('success','New admin user added successfully!');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        $user->detachRole($user->role);
        $user->attachRole($request->role);

        return redirect()->route('admin.users.index')->with('success','Admin user updated successfully!');
    }

    public function destroy(User $user)
    {
        if ($user->id === config('cms.default_user_id')) {
            return redirect()->back()->with('error-message', 'You can not delete default admin user or yourself!');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Admin user deleted successfully!');
    }

}
