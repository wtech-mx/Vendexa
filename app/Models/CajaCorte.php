<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaCorte extends Model
{
    use HasFactory;
    protected $table = "caja_corte";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'inicio',
        'ingresos',
        'egresos',
        'total',
        'fecha',
        'id_empresa',
    ];

    public function Empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
