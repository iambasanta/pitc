<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Member;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(){
        $adminUsers = User::all();
        $blogPosts = Post::all();
        $events = Event::all();
        $members = Member::all();

        return view('admin.home.index',compact('adminUsers','blogPosts','events','members'));
    }

    // methods to edit profle

    public function edit(Request $request){
        $user = $request->user();

        return view('admin.profile.edit',compact('user'));
    }

    public function update(Request $request){
        $user = $request->user();

        $user->update($this->validateRequest($request,$user));

        return redirect()->back()->with('success','Profile updated successfully!');
    }

    private function validateRequest($request){

        return $request->validate([
            'name'=>'required',
            'email' =>['required','email',Rule::unique('users','email')->ignore(auth()->user())],
            'password'=>'required_with:password_confirmation|confirmed'
        ]);
    }
}
