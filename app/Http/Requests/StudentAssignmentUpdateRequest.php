<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAssignmentUpdateRequest extends FormRequest
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
            'class_assignment_id' => 'nullable|exists:class_assignments,id',
            'individual_assignment_id' => 'nullable|exists:assignments,id',
            'duedate' => 'nullable|date',
            'assignment_status_id' => 'required|exists:assignment_statuses,id',
            'marked_by_id' => 'nullable|exists:users,id',
            'completed' => 'required|boolean',
            'marked_at' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'enrolment_class_id.required' => 'Het inschrijvingsklasse ID is verplicht.',
            'enrolment_class_id.exists' => 'Het geselecteerde inschrijvingsklasse ID is ongeldig.',
            'class_assignment_id.exists' => 'Het geselecteerde klasopdracht ID is ongeldig.',
            'individual_assignment_id.exists' => 'Het geselecteerde individuele opdracht ID is ongeldig.',
            'duedate.date' => 'De inleverdatum moet een geldige datum zijn.',
            'assignment_status_id.required' => 'De status van de opdracht is verplicht.',
            'assignment_status_id.exists' => 'De geselecteerde status van de opdracht is ongeldig.',
            'marked_by_id.exists' => 'De geselecteerde markerings-ID is ongeldig.',
            'completed.required' => 'De voltooid status is verplicht.',
            'completed.boolean' => 'De voltooid status moet waar of onwaar zijn.',
            'marked_at.date' => 'De markeringsdatum moet een geldige datum zijn.',
        ];
    }
}
