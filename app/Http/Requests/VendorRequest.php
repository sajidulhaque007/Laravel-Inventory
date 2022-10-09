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
            'user_id' => 'required|unique:vendors,user_id',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'image' => 'file|mimes:jpg,jpeg,png,gif|max:3096',
            'status' => 'required',
            
        ];
    }
}
