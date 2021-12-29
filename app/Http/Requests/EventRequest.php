<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            'event_category_id'=>'required',
            'title'=>'required',
            'slug'=>['required',Rule::unique('events','slug')->ignore($this->event)],
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png,bmp',
            'address'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'time'=>'required|date_format:H:i',
            'published_at'=>'required|date_format:Y-m-d',
        ];
    }
}
