<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorFacturas extends Model
{
    use HasFactory;
    protected $table = "proveedor_facturas";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'file',
        'fecha',
        'id_proveedor',
        'id_empresa',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }

    public function Proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor');
    }
}
