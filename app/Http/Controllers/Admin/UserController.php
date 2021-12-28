<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('admin.users.create',compact('user'));
    }

    public function store(Request $request)
    {
        User::create($this->validateRequest($request));

        return redirect()->route('admin.users.index')->with('success','New admin user added successfully!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
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

    private function validateRequest($request){

        return $request->validate([
            'name'=>'required',
            'email' =>'required|email|unique:users',
            'password'=>'required|confirmed|min:8'
        ]);
    }
}
