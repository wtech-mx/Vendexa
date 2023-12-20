<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosFacturas extends Model
{
    use HasFactory;
    protected $table = "datos_facturas";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id_cliente',
        'razon_social',
        'rfc',
        'cfdi',
        'direccion_factura',
    ];
    public function Cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }
}
