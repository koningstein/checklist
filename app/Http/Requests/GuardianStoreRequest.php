<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardianStoreRequest extends FormRequest
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
            'selected_user_id' => 'required|exists:users,id',
            'student_id' => 'required|exists:students,id',
        ];
    }

    /**
     * Aangepaste foutmeldingen voor de validatieregels.
     */
    public function messages(): array
    {
        return [
            'selected_user_id.required' => 'Selecteer een bestaande gebruiker.',
            'selected_user_id.exists' => 'De geselecteerde gebruiker bestaat niet.',
            'selected_user_id.unique' => 'Deze gebruiker is al een guardian.',
            'student_id.required' => 'Selecteer een student om aan de guardian te koppelen.',
            'student_id.exists' => 'De geselecteerde student bestaat niet.',
        ];
    }
}
