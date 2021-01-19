<?php

declare(strict_types=0);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category' => 'required|max:50|string',
            'name' => 'required|max:50|string',
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => 'Category is not provided',
            'name.required' => 'Name is not provided',
            'category.max' => 'Category is too long',
            'name.max' => 'Name is too long',
            'category.string' => 'Invalid category type',
            'name.string' => 'Invalid name type',
        ];
    }
}
