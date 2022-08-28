<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    public $incrementing = false;

    public $casts = ['id' => 'string'];
    public $fillable = ['id'];

    
}
