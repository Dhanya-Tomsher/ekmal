<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Contactdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
      //  'company',
      //  'subject',
        'message',
    ];

    
}
