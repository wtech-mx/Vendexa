<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = "productos";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'descripcion',
        'id_categoria',
        'id_subcategoria',
        'id_marca',
        'id_proveedor',
        'codigo_proveedor',
        'unidad_venta',
        'stock',
        'imagen_principal',
        'clave_sat',
        'sku',
        'costo',
        'visibilidad_estatus',
        'precio_normal',
        'precio_mayo',
        'codigo_mayo',
        'precio_descuento',
        'fecha_inicio_desc',
        'fecha_fin_desc',
        'id_empresa',
        'id_user',
        'id_woocommerce',
    ];

    public function Categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
    public function SubCategoria()
    {
        return $this->belongsTo(SubCategorias::class, 'id_subcategoria');
    }
    public function Marca()
    {
        return $this->belongsTo(Marcas::class, 'id_marca');
    }
    public function Proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor');
    }

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
    public function Users()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }
    public function ordenesProductos()
    {
        return $this->hasMany(OrdenesProductos::class, 'id_producto');
    }



}
