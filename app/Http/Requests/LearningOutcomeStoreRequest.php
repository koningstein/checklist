<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningOutcomeStoreRequest extends FormRequest
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
            'number' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'number.required' => 'Het nummer is verplicht.',
            'number.string' => 'Het nummer moet een tekst zijn.',
            'number.max' => 'Het nummer mag niet langer zijn dan 10 tekens.',
            'name.required' => 'De naam is verplicht.',
            'name.string' => 'De naam moet een tekst zijn.',
            'name.max' => 'De naam mag niet langer zijn dan 255 tekens.',
            'description.string' => 'De beschrijving moet een tekst zijn.',
        ];
    }
}
