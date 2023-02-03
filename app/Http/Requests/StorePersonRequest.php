<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            'id_number' => 'required|max:15|unique:people',
            'dob' => 'required|date',
            'age' => 'required|max:255',
            'mobile' => 'required|max:255',
            'address' => 'max:255',
            'religion' => 'max:255',
            'nationality' => 'max:255',
        ];
    }
}
