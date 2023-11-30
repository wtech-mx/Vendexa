<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $table = "clientes";
    protected $dateFormat = 'd/m/Y';
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
        'tipo',
        'constancia_fiscal',
        'id_empresa',
        'id_user',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
    public function User()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }
}
