<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'address',
        'date',
        'time',
        'published_at',
        'event_category_id',

        'resource_person_name',
        'resource_person_image',
        'resource_person_designation'
    ];

    public function eventCategory(){
        return $this->belongsTo(EventCategory::class);
    }

    protected $dates = ['date','time','published_at'];

    public function dateFormatted(){
        return $this->date->format("d/m/Y");
    }

    public function timeFormatted(){
        return $this->time->format("H:i A");
    }

    public function getImageUrlAttribute(){
        $imageUrl = "";

        if(!is_null($this->image)){
            $imagePath = public_path()."/events/".$this->image;
            if(file_exists($imagePath)) $imageUrl = asset("events/".$this->image);
        }

        return $imageUrl;
    }

    public function getPersonImageUrlAttribute(){
        $imageUrl = "";

        if(!is_null($this->resource_person_image)){
            $imagePath = public_path()."/person_image/".$this->resource_person_image;
            if(file_exists($imagePath)) $imageUrl = asset("person_image/".$this->resource_person_image);
        }

        return $imageUrl;
    }

    public function eventStatus(){
        if($this->date && ($this->date->isFuture())){
            return '<span class="badge bg-light-info">Upcomming</span>';
        }
        else {
            return '<span class="badge bg-light-success">Completed</span>';
        }
    }

    public function scopeCompleted($query)
    {
        return $query->where('date', '<=', Carbon::now());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', Carbon::now());
    }
}
