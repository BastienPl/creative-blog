<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'categoriy_id' => "exists:category",
            'isPublished' => 'in:0,1',
            'image_name' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
