<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class numeros extends Model
{
    protected $fillable = [
        'numero', 'color', 'probabilidad'
    ];

    protected $table = 'numeros';
    public $timestamps = false;
    protected $primaryKey = "id";
}