<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{

    protected $fillable = [
        'name',
        'time',
        'description'
    ];

    protected $table = 'plans';
}
