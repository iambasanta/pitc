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
        $member = new Member();
        return view('admin.members.create',compact('member'));
    }

    public function store(){
        $member = Member::create($this->validateRequest());

        $this->storeImage($member);
        return redirect()->route('members.index')->with('success','New member added successfully!');
    }

    public function edit(Member $member){
        return view('admin.members.edit',compact('member'));
    }

    public function update(Member $member){
        $oldImage = $member->image;
        $member->update($this->validateRequest());

        $this->storeImage($member);

        if($oldImage !== $member->image){
            $this->removeImage($oldImage);
        }

        return redirect()->route('members.index')->with('success','Member details updated successfully!');
    }

    public function destroy(Member $member){
        $member->delete();
        $this->removeImage($member->image);
        return redirect()->route('members.index')->with('success','Member deleted successfully!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'file|image|mimes:jpg,jpeg,png|max:5000',
            'designation' => 'required',
            'batch' => 'required',
            'facebook' => 'required',
            'linkedin'=>'nullable',
            'testimonial'=>'nullable'
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

    private function removeImage($image){
        if(!empty($image)){
            $imagePath = 'storage/'.$image;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }
    }
}
