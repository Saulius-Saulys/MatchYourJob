<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected array $fillable = [
        'user_id',
        'university_title',
        'name',
        'duration',
    ];
}
