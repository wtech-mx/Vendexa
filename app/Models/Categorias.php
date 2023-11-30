<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table = "categorias";
    protected $dateFormat = 'd/m/Y';
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'area',
        'id_empresa',
    ];
}
