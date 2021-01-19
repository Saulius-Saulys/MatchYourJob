<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category' => 'max:50|string',
            'name' => 'max:50|string',
        ];
    }

    public function messages(): array
    {
        return [
            'category.max' => 'Category is too long',
            'name.max' => 'Name is too long',
            'category.string' => 'Invalid category type',
            'name.string' => 'Invalid name type',
        ];
    }
}
