<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'name',
        'state_id',
        'ddd'
    ];

    protected $table = 'cities';

    public function state()
    {
        return $this->belongsTo(States::class, 'state_id');
    }

    public function tariff()
    {
       return $this->hasOne(Tariffs::class, 'id');
    }

    public function formattedName()
    {
        return "(0{$this->ddd}) {$this->name}/{$this->state->initials}" ;
    }

    public function tariffValue()
    {
        return $this->tariff->value ?? 0;
    }
}
