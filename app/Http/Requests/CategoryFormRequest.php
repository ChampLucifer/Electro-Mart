<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_name'=>['required','string'],
            'category_slug'=>['required','string'],
            'category_image'=>['nullable','mimes:jpg,jpeg,png,webp'],
            'meta_title'=>['required','string'],
            'meta_keyword'=>['required','string'],
        ];
    }
}
