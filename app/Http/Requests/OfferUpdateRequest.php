<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int',
            'industry_id' => 'int',
            'description' => 'max:500|string',
            'employment_type' => 'max:50|string|in:full,part',
            'title' => 'max:250|string',
            'salary_from' => 'numeric',
            'salary_to' => 'numeric',
        ];
    }
}
