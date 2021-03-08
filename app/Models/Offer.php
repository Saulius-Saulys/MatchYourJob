<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected array $fillable = [
        'user_id',
        'industry_id',
        'description',
        'employment_type',
        'title',
        'salary_from',
        'salary_to',
    ];
}
