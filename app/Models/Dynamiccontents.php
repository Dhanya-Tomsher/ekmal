<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Dynamiccontents extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title',
        'description',
     //   'image',
        'video_link',
        'link',
     //   'cover_image',
    ];

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }
    public function getCoverimage()
    {
        return $this->image ? URL::to($this->cover_image) : asset('adminassets/img/placeholder.png');
    }
}
