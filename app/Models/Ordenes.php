<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;
    protected $table = "ordenes";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id_cliente',
        'fecha',
        'tipo',
        'total',
        'restante',
        'comentario',
        'id_empresa',
        'id_user',
        'id_orden_woocommerce',
    ];
    public function Cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
    public function Productos()
    {
        return $this->hasMany(OrdenesProductos::class, 'id_orden');
    }
    public function Pagos()
    {
        return $this->hasMany(OrdenesPagos::class, 'id_orden');
    }
}
