<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\propietario;

class UpdatepropietarioRequest extends Request
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
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255',
            'old_password' => 'required|min:6|current_password',
            'password' => 'required|min:6',
            'password_again' => 'required|min:6|same:password'
        ];
    }
 
    public function messages()
    {
        return [];
    }
 
    /**
     * Get the sanitized input for the request.
     *
     * @return array
     */
    public function sanitize()
    {
        return $this->only('clave');
    }
}
