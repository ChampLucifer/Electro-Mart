<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdcutFormRequest extends FormRequest
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
        'product_category'=>['required','integer'],
        'product_name'=>['required','string'],
        'product_slug'=>['required','string'],
        'product_brand'=>['required','string'],
        'short_descripttion'=>['required','string'],
        'long_descripttion'=>['required','string'],
        'product_og_price'=>['required','integer'],
        'product_selling_price'=>['required','integer'],
        'product_quantity'=>['required','integer'],
        'product_meta_title'=>['required','string'],
        'product_meta_keyword'=>['required','string'],
        'product_meta_descripttion'=>['required','string'],
        ];
    }
}
