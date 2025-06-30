<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'city',
        'price',
        'points_to_give',
        ];


    public function festival()
    {
        return $this->belongsTo(Festival::class, 'festivalid');
    }

    public $timestamps = false;

}
