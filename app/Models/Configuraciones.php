<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuraciones extends Model
{
    use HasFactory;
    protected $table = "configuraciones";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'estatus_config',
        'logo',
        'tarjeta',
        'efectivo',
        'transferencia',
        'codigo_caja',
        'precio_mayorista',
        'sat_productos',
        'opcion_factura',
        'porcentaje_factura',
        'stock_alto',
        'stock_medio',
        'stock_bajo',
        'id_empresa',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
