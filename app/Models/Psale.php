<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psale extends Model
{
    use HasFactory;
    protected $table = "psales";
    protected $primaryKey = "psale_id";
}
