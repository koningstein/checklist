<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'studentNr' => 'required|string|max:10|unique:students,studentNr',
        ];

        if ($this->has('user_id')) {
            $rules['user_id'] = 'required|exists:users,id|unique:students,user_id';
        } else {
            $rules['new_user_name'] = 'required|string|max:255';
            $rules['new_user_email'] = 'required|string|email|max:255|unique:users,email';
            $rules['new_user_password'] = 'required|string|min:8';
        }

        return $rules;
    }
}
