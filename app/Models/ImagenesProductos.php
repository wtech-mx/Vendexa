<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesProductos extends Model
{
    use HasFactory;
    protected $table = "imagenes_productos";
    protected $dateFormat = 'd/m/Y';
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'imagen',
        'id_producto',
    ];

    public function Producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
}
