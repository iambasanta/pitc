<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'body',
        'image',
        'author',
        'published_at'
    ];

    protected $dates = ['published_at'];

    public function category()
    {
        return  $this->belongsTo(Category::class);
    }

    public function dateFormatted(){
        return $this->created_at->format("d/m/Y");
    }

    public function publicationStatus(){
        if (!$this->published_at) {
            return '<span class="badge bg-light-warning">Draft</span>';
        }elseif($this->published_at && ($this->published_at->isFuture())){
            return '<span class="badge bg-light-info">Schedule</span>';
        }
        else {
            return '<span class="badge bg-light-success">Published</span>';
        }
    }
}
