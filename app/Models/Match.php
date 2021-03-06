<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    protected $table = "matches";

    protected $fillable = [
        'user_id',
        'offer_id',
        'user_matched',
        'offer_matched'
    ];
}
