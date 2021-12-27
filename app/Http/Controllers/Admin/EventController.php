<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $limit = 10;

    protected $uploadPath;

    public function __construct()
    {
       $this->uploadPath = public_path('events');
    }

    public function index(Request $request)
    {
        if (($status = $request->get('status')) && $status == 'completed') {
            $events = Event::completed()->latest()->paginate($this->limit);
        } elseif ($status == 'upcoming') {
            $events = Event::upcoming()->latest()->paginate($this->limit);
        } else {
            $events = Event::latest()->paginate($this->limit);
        }

        return view('admin.events.index',compact('events'));
    }

    public function create()
    {
        $event = new Event();

        return view('admin.events.create',compact('event'));
    }

    public function store(EventRequest $request)
    {
        $data = $this->handleRequest($request);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success','New event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit',compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $this->handleRequest($request);

        $oldImage = $event->image;

        $event->update($data);

        if($oldImage !== $event->image){
            $this->removeImage($oldImage);
        }

        return redirect()->route('admin.events.index')->with('success','Event edited successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        $this->removeImage($event->image);

        return redirect()->route('admin.events.index')->with('success','Event deleted successfully!');
    }

    protected function handleRequest($request){
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

    protected function removeImage($image){
        if(!empty($image)){
            $imagePath = $this->uploadPath.'/'.$image;

            if(file_exists($imagePath)) unlink($imagePath);
        }
    }
}
