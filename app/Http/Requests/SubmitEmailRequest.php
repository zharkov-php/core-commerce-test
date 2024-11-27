<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitEmailRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email_address' => ['required', 'email'],
            'message' => ['required'],
            'attachment' => ['nullable', 'string'],
            'attachment_filename' => ['nullable', 'string'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email_address.required' => 'The email_address field is required.',
            'email_address.email' => 'The email_address must be a valid email address.',
            'message.required' => 'The message field is required.',
            'attachment.string' => 'The attachment must be a string.',
            'attachment_filename.string' => 'The attachment_filename must be a string.',
        ];
    }
}
