<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;

    protected $table = 'compradores';
    protected $primaryKey = 'id_comprador';
    public $timestamps = false;

    protected $fillable = [
        'id_comprador',
        'identificacion',
        'nombre',
        'correo',
        'telefono',
    ];
}
