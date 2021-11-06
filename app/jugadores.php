<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jugadores extends Model
{
    protected $fillable = [
        'nombre', 'identificacion', 'dinero'
    ];

    protected $table = 'jugadores';
    public $timestamps = false;
    protected $primaryKey = "id";
}
