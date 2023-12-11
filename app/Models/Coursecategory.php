<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Coursecategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
      //  'image',
        'sort_order',
        'status',
    ];

    
}
