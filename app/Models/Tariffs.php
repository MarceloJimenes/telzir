<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariffs extends Model
{
    protected $fillable = [
        'city_id',
        'value',
    ];

    protected $table = 'tariffs';

    public function city()
    {
        return $this->belongsTo(Cities::class, 'id', 'city_id');
    }
}
