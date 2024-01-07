<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;
    protected $table = "empresas";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'referencia',
        'telefono',
        'correo',
        'colonia',
        'codigo_postal',
        'alcaldia',
        'calle_numero',
        'giro',
        'id_direccion',
    ];

    public function Direcion()
    {
        return $this->belongsTo(Direcciones::class, 'id_direccion');
    }
}
