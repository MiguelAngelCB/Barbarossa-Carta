<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $category = $this->route()->parameter('category');

        $rules = [
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories'
        ];
        if ($category) {
            $rules['name'] =  'required|unique:categories,slug,'.$category->id;
            $rules['slug'] =  'required|unique:categories,slug,'.$category->id;
        }
        
        return $rules;
    }
}
