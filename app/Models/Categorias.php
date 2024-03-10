<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = "categorias";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'area',
        'id_empresa',
    ];

    public function subcategorias()
    {
        return $this->hasMany(SubCategorias::class, 'id_categoria');
    }
}
