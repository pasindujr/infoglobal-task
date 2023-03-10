<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
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
            'name' => 'required|max:255',
            'id_number' => 'required|max:15',
            'dob' => 'required|date',
            'age' => 'required|max:255|integer|between:12,100',
            'mobile' => 'required|max:255',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'religion' => 'required|max:255',
            'nationality' => 'required|max:255',
        ];
    }
}
