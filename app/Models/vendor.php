<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function connect_to_user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
