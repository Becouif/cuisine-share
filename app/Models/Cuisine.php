<?php

namespace App\Models;
use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Cuisine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function continent(){
        return $this->hasOne(Continent::class,'id','continent_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    
}

