<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModificacionesProductos extends Model
{
    use HasFactory;
    protected $table = "modificaciones_producos";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'costo',
        'precio_normal',
        'sku',
        'stock',
        'unidad_venta',
        'visibilidad_estatus',
        'fecha',
        'id_producto',
        'id_empresa',
        'id_user',
    ];
    public function Producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
