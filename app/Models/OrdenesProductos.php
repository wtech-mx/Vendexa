<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenesProductos extends Model
{
    use HasFactory;
    protected $table = "ordenes_productos";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id_orden',
        'id_producto',
        'id_woocommerce',
        'cantidad',
        'precio',
        'subtotal',
        'fecha',
    ];
    public function Ordenes()
    {
        return $this->belongsTo(Ordenes::class, 'id_orden');
    }

    public function Productos()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
}
