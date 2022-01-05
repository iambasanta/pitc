<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;

class MemberController extends Controller
{
    protected $limit = 10;

    protected $uploadPath;

    public function __construct()
    {
       $this->uploadPath = public_path('members');
    }

    public function index(){
        $members = Member::latest()->paginate(10);
        return view('admin.members.index',compact('members'));
    }

    public function create(){
        $member = new Member();
        return view('admin.members.create',compact('member'));
    }

    public function store(MemberRequest $request){
        $data = $this->handleRequest($request);

        Member::create($data);

        return redirect()->route('admin.members.index')->with('success','New member added successfully!');
    }

    public function edit(Member $member){
        return view('admin.members.edit',compact('member'));
    }

    public function update(MemberRequest $request,Member $member){

        $data = $this->handleRequest($request);

        $oldImage = $member->image;

        $member->update($data);

        if($oldImage !== $member->image){
            $this->removeImage($oldImage);
        }

        return redirect()->route('admin.members.index')->with('success','Member details updated successfully!');
    }

    public function destroy(Member $member){
        $member->delete();
        $this->removeImage($member->image);
        return redirect()->route('admin.members.index')->with('success','Member deleted successfully!');
    }


    private function handleRequest($request){
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination,$fileName);
            
            $data['image'] = $fileName;
        }

        return $data;
    }

    private function removeImage($image){
        if(!empty($image)){
            $imagePath = $this->uploadPath.'/'.$image;

            if(file_exists($imagePath)) unlink($imagePath);
        }
    }
}
