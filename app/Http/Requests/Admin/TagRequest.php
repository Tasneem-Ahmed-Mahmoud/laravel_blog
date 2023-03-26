<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules= [
    
            'title'=>'required|min:3|max:10',
            'slug'=>'required|min:3|max:10|unique:categories',
            'description'=>'required|min:5',
            'keywords'=>'required|min:5'
                  
    ];
    if($this->tag){
       $rules['slug']= 'required|min:3|max:10|unique:categories,id,'.$this->tag->id;
    }
    return $rules;
}
    }

