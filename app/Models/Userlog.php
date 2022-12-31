<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    use HasFactory;
    protected $table = "userlogs";
    protected $primaryKey = "user_log_id ";

    public function user(){
        return $this->hasMany('App\Models\User','user_id','id');
    }
}
