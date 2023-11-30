<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;
    protected $table = "marcas";
    protected $dateFormat = 'd/m/Y';
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'id_empresa',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
}
