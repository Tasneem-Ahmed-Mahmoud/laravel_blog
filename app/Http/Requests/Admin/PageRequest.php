<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
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
        $rules= [
    
                'title'=>'required|min:3|max:10',
                'slug'=>'required|min:3|max:10|unique:pages',
                'description'=>'required|min:5',
                'keywords'=>'required|min:5',
                'content' => 'required|min:10',
                      
        ];
        if($this->page){
           $rules['slug']= 'required|min:3|max:10|unique:pages,id,'.$this->page->id;
        }
        return $rules;
    }
}
