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
}
