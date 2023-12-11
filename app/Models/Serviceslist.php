<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Serviceslist extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'sort_order',
        'status',
    ];
}
