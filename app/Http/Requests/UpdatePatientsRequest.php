<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'blood_group' => 'required',
            'phone' => 'required',
            'guardian_name' => 'required',
            'relation' => 'required',
            'g_phone' => 'required',
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'gender.required' => 'Gender is required',
            'date_of_birth.required' => 'Date of Birth is required',
            'blood_group.required' => 'Blood Group is required',
            'phone.required' => 'Phone Number is required',
            'guardian_name.required' => 'Guardian Name is required',
            'relation.required' => 'Relation with patient is required',
            'g_phone.required' => 'Guardian Phone Number is required',
        ];
    }
}
