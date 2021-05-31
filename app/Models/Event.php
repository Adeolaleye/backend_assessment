<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = ['id', 'type', 'actor', 'repo', 'created_at'];

    protected $casts = [
        'actor' => 'array',
        'repo' => 'array'
    ];
}
