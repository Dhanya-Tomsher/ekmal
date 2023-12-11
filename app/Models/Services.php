<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        //'image',
        'sort_order',
        'status',
    ];
    public function getImage()
{
    return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
}
public function getDetailspageimage()
{
    return $this->detailspage_image ? URL::to($this->detailspage_image) : asset('adminassets/img/placeholder.png');
}

public function service_details(){
    return $this->hasMany(Serviceslist::class,'service_id','id');
}

}
