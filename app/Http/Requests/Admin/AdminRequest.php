<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
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
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'image' => "required|mimes:jpeg,jpg,png|max:512",
        ];

        if($this->admin){
            $rules['email'] =  'required|email|unique:admins,email,'.$this->admin->id;
            $rules['password'] =  'nullable|min:6';
            $rules['confirm_password'] =  'required_with:password|same:password';
        }

        if($this->admin->image != '')
        $rules['image'] = "nullable|mimes:jpeg,jpg,png|max:512";

        return $rules;
    }
}
