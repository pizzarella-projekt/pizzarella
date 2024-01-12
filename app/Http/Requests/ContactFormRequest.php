<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact_email' => 'required|email',
            'contact_name' => 'required',
            'contact_message' => 'required|max:10240',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'contact_email.required' => 'To pole jest wymagane',
            'contact_email.email' => 'Wprowadzono niepoprawny adres email',

            'contact_name.required' => 'To pole jest wymagane',

            'contact_message.required' => 'To pole jest wymagane',
        ];
    }
}
