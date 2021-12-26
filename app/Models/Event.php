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
        'published_at'
    ];

    protected $dates = ['date','published_at'];

    public function dateFormatted(){
        return $this->date->format("d/m/Y");
    }

    public function getImageUrlAttribute(){
        $imageUrl = "";

        if(!is_null($this->image)){
            $imagePath = public_path()."/events/".$this->image;
            if(file_exists($imagePath)) $imageUrl = asset("events/".$this->image);
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
