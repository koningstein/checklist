<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Naam is verplicht.',
            'name.max' => 'Naam mag niet langer zijn dan 255 tekens.',
            'email.required' => 'Email is verplicht.',
            'email.email' => 'Voer een geldig emailadres in.',
            'email.max' => 'Email mag niet langer zijn dan 255 tekens.',
            'message.required' => 'Bericht is verplicht.',
            'message.max' => 'Bericht mag niet langer zijn dan 5000 tekens.',
        ];
    }
}
