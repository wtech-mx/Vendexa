<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;
    protected $table = "direcciones";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'pais',
        'estado',
        'colonia',
        'codigo_postal',
        'alcaldia',
        'calle_numero',
    ];
}
