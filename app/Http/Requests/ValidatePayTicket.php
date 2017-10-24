<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePayTicket extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//by default - false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'   => 'required|max:17|min:4',
            'last_name'    => 'required|max:25|min:3',            
            'phone_number' => 'required|max:12',
            'email'        => 'required',
        ];
    }
}
