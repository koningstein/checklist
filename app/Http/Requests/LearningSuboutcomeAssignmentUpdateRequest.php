<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningSuboutcomeAssignmentUpdateRequest extends FormRequest
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
            'learning_suboutcome_level_id' => 'required|exists:learning_suboutcome_levels,id',
            'assignment_id' => 'required|exists:assignments,id',
        ];
    }

    public function messages(): array
    {
        return [
            'learning_suboutcome_level_id.required' => 'Het leeruitkomst niveau-ID is verplicht.',
            'learning_suboutcome_level_id.exists' => 'Het geselecteerde leeruitkomst niveau-ID is ongeldig.',
            'assignment_id.required' => 'Het opdracht-ID is verplicht.',
            'assignment_id.exists' => 'Het geselecteerde opdracht-ID is ongeldig.',
        ];
    }
}
