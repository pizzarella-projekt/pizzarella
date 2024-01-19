<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'street' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'city' => 'required|max:255',
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
            'email.required' => 'To pole jest wymagane',
            'email.email' => 'Wprowadzono niepoprawny adres email',

            'name.required' => 'To pole jest wymagane',
            'phone.required' => 'To pole jest wymagane',
            'street.required' => 'To pole jest wymagane',
            'postal_code.required' => 'To pole jest wymagane',
            'city.required' => 'To pole jest wymagane',
        ];
    }
}
