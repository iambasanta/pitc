<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        $members = Member::paginate(10);
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

        return redirect('/admin/members')->with('message','Member details updated successfully!');
    }

    public function destroy(Member $member){
        $member->delete();
        $this->removeImage($member->image);
        return redirect('/admin/members')->with('message','Member deleted successfully!');
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

    private function removeImage($image){
        if(!empty($image)){
            $imagePath = 'storage/'.$image;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }
    }
}
