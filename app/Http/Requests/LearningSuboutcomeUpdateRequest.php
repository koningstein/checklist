<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningSuboutcomeUpdateRequest extends FormRequest
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
            'learning_outcome_id' => 'required|exists:learning_outcomes,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'learning_outcome_id.required' => 'Het leeruitkomst ID is verplicht.',
            'learning_outcome_id.exists' => 'Het geselecteerde leeruitkomst ID bestaat niet.',
            'name.required' => 'De naam is verplicht.',
            'name.string' => 'De naam moet een tekst zijn.',
            'name.max' => 'De naam mag niet langer zijn dan 255 tekens.',
            'description.string' => 'De beschrijving moet een tekst zijn.',
        ];
    }
}
