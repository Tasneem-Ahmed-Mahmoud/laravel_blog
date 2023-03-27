<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules =  [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];

        if($this->user){
            $rules['email'] =  'required|email|unique:users,email,'.$this->user->id;
            $rules['password'] =  'nullable|min:6';
            $rules['confirm_password'] =  'required_with:password|same:password';
        }

        return $rules;
    }


    function message(){
        return[
            'name.required'=>"type name pleas"

        ];
    }




   
}
