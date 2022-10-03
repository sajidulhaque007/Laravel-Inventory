<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class vendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function connect_to_user(){
    //     return $this->belongsTo('App\Models\User','user_id','id');
    // }
    
    public function connect_to_user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
