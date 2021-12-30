<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $limit = 10;

    protected $uploadPath, $personImageStorePath;

    public function __construct()
    {
       $this->uploadPath = public_path('events');
       $this->personImageStorePath = public_path('person_image');
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
        $categories = EventCategory::orderBy('title')->get();

        return view('admin.events.create',compact('event','categories'));
    }

    public function store(EventRequest $request)
    {
        $data = $this->handleRequest($request);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success','New event created successfully!');
    }

    public function edit(Event $event)
    {
        $categories = EventCategory::orderBy('title')->get();

        return view('admin.events.edit',compact('event','categories'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $this->handleRequest($request);

        $oldImage = $event->image;

        $personOldImage = $event->resource_person_image;

        $event->update($data);

        if($oldImage !== $event->image){
            $this->removeImage($oldImage,$this->uploadPath);
        }

        if($personOldImage !== $event->resource_person_image){
            $this->removeImage($personOldImage,$this->personImageStorePath);
        }

        return redirect()->route('admin.events.index')->with('success','Event edited successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        $this->removeImage($event->image,$this->uploadPath);

        $this->removeImage($event->resource_person_image,$this->personImageStorePath);

        return redirect()->route('admin.events.index')->with('success','Event deleted successfully!');
    }

    protected function handleRequest($request){
        $data = $request->all();

        // store event image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination,$fileName);
            
            $data['image'] = $fileName;
        }

        // store resource person image
        if ($request->hasFile('resource_person_image')) {
            $personImage = $request->file('resource_person_image');
            $personImageName = $personImage->getClientOriginalName();
            $personImageStoreDestionation = $this->personImageStorePath;

            $personImage->move($personImageStoreDestionation, $personImageName);

            $data['resource_person_image'] = $personImageName;
        }

        return $data;
    }

    protected function removeImage($image,$storedPath){
        if(!empty($image)){
            $imagePath = $storedPath.'/'.$image;

            if(file_exists($imagePath)) unlink($imagePath);
        }
    }
}
