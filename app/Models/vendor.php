<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class vendor extends Model
{
    use HasFactory;
    protected $guarded =[];
    // protected $fillable = [
    //     'user_id',
    //     'date_of_birth',
    //     'status',
    // ];

    public function connect_to_user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
