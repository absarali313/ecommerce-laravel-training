<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        return [
            'title' => 'required | string | max:255',
            'description' => 'required | string',
            'images' => 'nullable',
            'visibility' => ['required', Rule::in(['active', 'inactive'])],
            'categories' => 'nullable | array',
            'categories.*' => 'exists:categories,id',
        ];
    }
}
