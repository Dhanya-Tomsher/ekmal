<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        //'image',
        'sort_order',
        'status',
    ];



public function getImage()
{
    return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
}
public function getCoverimage()
{
    return $this->cover_image ? URL::to($this->cover_image) : asset('adminassets/img/placeholder.png');
}
}