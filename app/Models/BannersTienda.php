<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannersTienda extends Model
{
    use HasFactory;
    protected $table = "banners_tienda";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id_empresa',
        'imagen',
        'orden',
        'estatus',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
