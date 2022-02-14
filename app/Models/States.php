<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $fillable = [
        'name',
        'initials'
    ];

    protected $table = 'states';

    public function cities()
    {
        return $this->hasMany(Cities::class, 'state_id', 'id');
    }
}
