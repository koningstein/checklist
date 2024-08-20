<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardianStoreNewRequest extends FormRequest
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
        return [
            'new_user_name' => 'required|string|max:255',
            'new_user_email' => 'required|string|email|max:255|unique:users,email',
            'new_user_password' => 'required|string|min:8',
            'student_id' => 'required|exists:students,id',
        ];
    }

    public function messages(): array
    {
        return [
            'new_user_name.required' => 'De naam van de nieuwe gebruiker is vereist.',
            'new_user_email.required' => 'Het e-mailadres van de nieuwe gebruiker is vereist.',
            'new_user_email.email' => 'Het opgegeven e-mailadres is ongeldig.',
            'new_user_email.unique' => 'Dit e-mailadres is al in gebruik.',
            'new_user_password.required' => 'Het wachtwoord voor de nieuwe gebruiker is vereist.',
            'new_user_password.min' => 'Het wachtwoord moet minstens 8 tekens lang zijn.',
            'student_id.required' => 'Selecteer een student om aan de guardian te koppelen.',
            'student_id.exists' => 'De geselecteerde student bestaat niet.',
        ];
    }
}
