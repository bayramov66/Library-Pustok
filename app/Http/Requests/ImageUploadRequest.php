<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'title'=>['required', 'min:2','max:300'],
             'head'=>['required', 'min:2','max:300'],
             'image_path'=>['required','image','mimes:img,jpg,png,svg,webp',]
        ];
    }
}
