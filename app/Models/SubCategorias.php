<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorias extends Model
{
    use HasFactory;
    protected $table = "subcategorias";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'id_categoria',
        'id_empresa',
    ];

    public function Categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
    
    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
