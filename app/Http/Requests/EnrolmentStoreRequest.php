<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrolmentStoreRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'crebo_id' => 'required|exists:crebos,id',
            'cohort_id' => 'required|exists:cohorts,id',
            'date' => 'required|date',
            'enrolment_status_id' => 'required|exists:enrolment_statuses,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'student_id' => 'student',
            'crebo_id' => 'crebo',
            'cohort_id' => 'cohort',
            'date' => 'datum',
            'enrolment_status_id' => 'status',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'De student is verplicht.',
            'student_id.exists' => 'De geselecteerde student bestaat niet.',
            'crebo_id.required' => 'De crebo is verplicht.',
            'crebo_id.exists' => 'De geselecteerde crebo bestaat niet.',
            'cohort_id.required' => 'De cohort is verplicht.',
            'cohort_id.exists' => 'De geselecteerde cohort bestaat niet.',
            'date.required' => 'De datum is verplicht.',
            'date.date' => 'De datum moet een geldige datum zijn.',
            'enrolment_status_id.required' => 'De status is verplicht.',
            'enrolment_status_id.exists' => 'De geselecteerde status bestaat niet.',
        ];
    }
}
