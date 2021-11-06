<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rondas_maestro extends Model
{
    protected $fillable = [
        'resultado'
    ];

    protected $table = 'rondas_maestro';
    public $timestamps = false;
    protected $primaryKey = "id";
}