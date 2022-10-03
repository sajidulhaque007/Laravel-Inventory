<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date_of_birth' => 'required|date_format:Y-m-d|after:today',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'status' => 'required',
            
        ];
    }
}
