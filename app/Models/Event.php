<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'actor', 'repo'];
    protected $casts = [
        'actor' => 'json',
        'repo' => 'json'
    ];

}
