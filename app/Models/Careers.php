<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Careers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'description',
        'status',
    ];

    
}
