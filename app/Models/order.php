<?php

namespace App\Models;

use App\Models\city;
use App\Models\service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function cities(){
        return $this->belongsTo(city::class);
    }
    public function services(){
        return $this->belongsTo(service::class);
    }
}
