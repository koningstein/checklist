<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAssignmentStoreRequest extends FormRequest
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
            'enrolment_class_id' => 'required|exists:enrolment_classes,id',
            'individual_assignment_id' => 'required|exists:assignments,id',
            'duedate' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'enrolment_class_id.required' => 'De klas is verplicht.',
            'enrolment_class_id.exists' => 'De geselecteerde klas bestaat niet.',
            'individual_assignment_id.required' => 'De opdracht is verplicht.',
            'individual_assignment_id.exists' => 'De geselecteerde opdracht bestaat niet.',
            'duedate.date' => 'De inleverdatum moet een geldige datum zijn.',
        ];
    }
}
