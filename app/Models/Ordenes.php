<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;
    protected $table = "ordenes";
    protected $dateFormat = 'd/m/Y';
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
        return $this->belongsTo(Users::class, 'id_user');
    }
    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
