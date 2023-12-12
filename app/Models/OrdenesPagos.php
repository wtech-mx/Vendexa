<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenesPagos extends Model
{
    use HasFactory;
    protected $table = "ordenes_prod_pagos";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id_orden',
        'monto',
        'dinero_recibido',
        'cambio',
        'metodo_pago',
        'comprobante',
        'fecha',
    ];
    public function Ordenes()
    {
        return $this->belongsTo(Ordenes::class, 'id_orden');
    }
}
