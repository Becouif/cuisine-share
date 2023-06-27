<?php

namespace App\Models;
use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function continent(){
        return $this->hasOne(Continent::class,'id','continent_id');
    }


    
}

