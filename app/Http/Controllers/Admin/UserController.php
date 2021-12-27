<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function update(Request $request, User $user)
    {
        $user->update($this->validateRequest($request,$user));
        return redirect()->route('admin.users.index')->with('success','Admin user updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Admin user deleted successfully!');
    }

    private function validateRequest($request, ?User $user = null){

        $user ??= new User();

        return $request->validate([
            'name'=>'required',
            'email' =>['required','email',Rule::unique('users','email')->ignore($user)],
            'password'=>'required|confirmed|min:3'
        ]);
    }
}
