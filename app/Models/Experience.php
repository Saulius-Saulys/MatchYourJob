<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_title',
        'name',
        'duration',
    ];
}
