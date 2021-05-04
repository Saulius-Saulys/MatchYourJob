<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|int',
            'industry_id' => 'required|int',
            'description' => 'required|max:500|string',
            'employment_type' => 'required|max:50|string|in:full,part, Full time',
            'title' => 'required|max:250|string',
            'salary_from' => 'required|numeric',
            'salary_to' => 'required|numeric',
        ];
    }
}
