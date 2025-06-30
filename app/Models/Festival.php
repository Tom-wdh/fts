<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'date',
        ];

public function trip()
{
    return $this->hasMany(Trip::class);
}

    public $timestamps = false;
}
