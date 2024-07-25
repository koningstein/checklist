<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningSuboutcomeTechniqueUpdateRequest extends FormRequest
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
            'learning_suboutcome_id' => 'required|exists:learning_suboutcomes,id',
            'learning_related_technique_id' => 'required|exists:learning_related_techniques,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'learning_suboutcome_id.required' => 'Het subleerdoel is verplicht.',
            'learning_suboutcome_id.exists' => 'Het geselecteerde subleerdoel is ongeldig.',
            'learning_related_technique_id.required' => 'De gerelateerde techniek is verplicht.',
            'learning_related_technique_id.exists' => 'De geselecteerde gerelateerde techniek is ongeldig.',
        ];
    }
}
