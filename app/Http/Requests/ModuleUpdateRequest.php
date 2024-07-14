<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleUpdateRequest extends FormRequest
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
            'period_id' => 'required|exists:periods,id',
            'course_id' => 'required|exists:courses,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht.',
            'name.string' => 'De naam moet een tekenreeks zijn.',
            'name.max' => 'De naam mag niet meer dan 150 tekens bevatten.',
            'description.string' => 'De beschrijving moet een tekenreeks zijn.',
            'period_id.required' => 'De periode is verplicht.',
            'period_id.exists' => 'De geselecteerde periode is ongeldig.',
            'course_id.required' => 'De cursus is verplicht.',
            'course_id.exists' => 'De geselecteerde cursus is ongeldig.',
        ];
    }
}
