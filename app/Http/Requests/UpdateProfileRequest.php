<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            "profile_img" => 'mimes:jpg,png,jpeg|max:4000',
            "about" => 'unique:profiles',
            "facebook" => 'unique:profiles',
            "twitter" => 'unique:profiles',
            "instagram" => 'unique:profiles',
        ];
    }
}
