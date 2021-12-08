<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        $members = Member::latest()->paginate(10);
        return view('admin.members.index',compact('members'));
    }

    public function create(){
        return view('admin.members.create');
    }

    public function store(){
        $member = Member::create($this->validateRequest());

        $this->storeImage($member);
        return redirect('/admin/members')->with('message','New member added successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'file|image|max:5000',
            'designation' => 'required',
            'batch' => 'required',
            'facebook' => 'required',
            'linkedin'=>'nullable'
        ]);
    }

    private function storeImage($member)
    {
        if (request()->has('image')) {
            $member->update([
                'image' => request()->image->store('members', 'public'),
            ]);
        }
    }
}
