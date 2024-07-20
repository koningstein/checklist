<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassAssignmentStoreRequest extends FormRequest
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
            'class_year_id' => 'required|exists:class_years,id',
            'assignment_id' => 'required|exists:assignments,id',
            'duedate' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'class_year_id.required' => 'Het veld klasjaar is verplicht.',
            'class_year_id.exists' => 'De geselecteerde klasjaar is ongeldig.',
            'assignment_id.required' => 'Het veld opdracht is verplicht.',
            'assignment_id.exists' => 'De geselecteerde opdracht is ongeldig.',
            'duedate.date' => 'De einddatum moet een geldige datum zijn.',
        ];
    }
}
