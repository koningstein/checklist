<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningSuboutcomeAssignmentStoreRequest extends FormRequest
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
            'learning_suboutcome_level_ids' => 'required|array|min:1',  // Verplicht en moet een array zijn
            'learning_suboutcome_level_ids.*' => 'exists:learning_suboutcome_levels,id',  // Elk element in de array moet bestaan in de learning_suboutcome_levels tabel
            'assignment_id' => 'required|exists:assignments,id',
        ];
    }

    public function messages(): array
    {
        return [
            'learning_suboutcome_level_ids.required' => 'Het is verplicht om ten minste één leeruitkomstniveau te selecteren.',
            'learning_suboutcome_level_ids.array' => 'De leeruitkomstniveaus moeten in een array worden doorgegeven.',
            'learning_suboutcome_level_ids.*.exists' => 'Een of meer van de geselecteerde leeruitkomstniveaus zijn ongeldig.',
            'assignment_id.required' => 'Het assignment-ID is verplicht.',
            'assignment_id.exists' => 'Het geselecteerde assignment-ID is ongeldig.',
        ];
    }
}
