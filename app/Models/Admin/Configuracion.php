<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    protected $table = "admin_configuracion";
    protected $primarykey = "id";

    protected $fillable = [
        'img_enero',
        'img_febrero',
        'img_marzo',
        'img_abril',
        'img_mayo',
        'img_junio',
        'img_julio',
        'img_agosto',
        'img_septiembre',
        'img_octubre',
        'img_noviembre',
        'img_diciembre',
    ];
}
