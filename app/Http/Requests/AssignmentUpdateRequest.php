<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'duedate' => 'nullable|date',
            'module_id' => 'required|exists:modules,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam van de opdracht is verplicht.',
            'name.string' => 'De naam van de opdracht moet een tekenreeks zijn.',
            'name.max' => 'De naam van de opdracht mag niet langer zijn dan 150 tekens.',
            'description.string' => 'De beschrijving moet een tekenreeks zijn.',
            'duedate.date' => 'De opgegeven datum moet een geldige datum zijn.',
            'module_id.required' => 'De module-id is verplicht.',
            'module_id.exists' => 'De opgegeven module-id moet bestaan in de modules-tabel.',
        ];
    }
}
