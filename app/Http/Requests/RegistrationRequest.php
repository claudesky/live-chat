<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // If nobody is logged in
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * Return the validated data
     * 
     * @return array
     */
    public function validated($keys = null)
    {
        $input = parent::validated($keys);

        $input['password'] = bcrypt($input['password']);

        return $input;
    }
}
