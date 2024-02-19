<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencias extends Model
{
    use HasFactory;

    protected $table = "licencias";
    protected $primarykey = "id";

    protected $fillable = [
        'id_empresa',
        'comentario',
        'vendedor',
        'membrecia',
        'codigo',
        'estatus',
        'caducidad',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
