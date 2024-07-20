<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrolmentClassStoreRequest extends FormRequest
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
            'enrolment_id' => 'required|exists:enrolments,id',
            'class_year_id' => 'required|exists:class_years,id',
            'assignments' => 'sometimes|accepted',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'enrolment_id.required' => 'De inschrijving is verplicht.',
            'enrolment_id.exists' => 'De geselecteerde inschrijving bestaat niet.',
            'class_year_id.required' => 'De klas is verplicht.',
            'class_year_id.exists' => 'De geselecteerde klas bestaat niet.',
            'assignments.accepted' => 'De waarde van opdrachten toewijzen moet waar of onwaar zijn.',
        ];
    }
}
