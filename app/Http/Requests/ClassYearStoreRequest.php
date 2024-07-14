<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassYearStoreRequest extends FormRequest
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
            'school_class_id' => 'required|exists:school_classes,id',
            'school_year_id' => 'required|exists:school_years,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'school_class_id.required' => 'Het schoolklas veld is verplicht.',
            'school_class_id.exists' => 'De geselecteerde schoolklas bestaat niet.',
            'school_year_id.required' => 'Het schooljaar veld is verplicht.',
            'school_year_id.exists' => 'Het geselecteerde schooljaar bestaat niet.',
        ];
    }
}
