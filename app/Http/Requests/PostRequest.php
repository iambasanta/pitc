<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')->ignore($this->post)],
            'category_id'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            'image'=>'mimes:jpeg,jpg,png,bmp',
            'author'=>'required',
            'published_at'=>'nullable|date_format:Y-m-d',
        ];
    }
}
