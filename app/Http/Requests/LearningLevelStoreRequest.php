<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningLevelStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'De naam van het leer niveau is verplicht.',
            'name.string' => 'De naam van het leer niveau moet een geldige tekst zijn.',
            'name.max' => 'De naam van het leer niveau mag niet langer zijn dan 50 tekens.',
            'description.string' => 'De beschrijving moet een geldige tekst zijn.',
        ];
    }
}
