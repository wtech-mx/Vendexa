<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaIngresos extends Model
{
    use HasFactory;
    protected $table = "caja_ingresos";
    protected $primarykey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id_empresa',
        'id_user',
        'monto',
        'concepto',
        'foto',
        'fecha',
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
