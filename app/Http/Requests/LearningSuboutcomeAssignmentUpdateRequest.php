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
            'learning_suboutcome_id' => 'required|exists:learning_suboutcomes,id',
            'assignment_id' => 'required|exists:assignments,id',
        ];
    }

    public function messages(): array
    {
        return [
            'learning_suboutcome_id.required' => 'Het leeruitkomst-ID is verplicht.',
            'learning_suboutcome_id.exists' => 'Het geselecteerde leeruitkomst-ID is ongeldig.',
            'assignment_id.required' => 'Het assignment-ID is verplicht.',
            'assignment_id.exists' => 'Het geselecteerde assignment-ID is ongeldig.',
        ];
    }
}
