<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Member;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $adminUsers = User::all();
        $blogPosts = Post::all();
        $events = Event::all();
        $members = Member::all();

        return view('admin.index',compact('adminUsers','blogPosts','events','members'));
    }
}
