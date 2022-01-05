<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'image',
        'type',
        'designation',
        'batch',
        'facebook',
        'linkedin',
        'testimonial'
    ];

    protected $attributes = [
        'type' => 0
    ];

    public function getTypeAttribute($attribute)
    {
        return $this->typeOptions()[$attribute];
    }

    public function typeOptions(){
        return [
            0 => 'General',
            1 => 'Executive',
        ];
    }

    public function getImageUrlAttribute(){
        $imageUrl = "";

        if(!is_null($this->image)){
            $imagePath = public_path()."/members/".$this->image;
            if(file_exists($imagePath)) $imageUrl = asset("members/".$this->image);
        }

        return $imageUrl;
    }
}
