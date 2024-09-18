<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 
        'talla', 
        'cantidad_inicial', 
        'ventas_del_dia', 
        'cantidad_actual', 
        'sobrante_del_dia_anterior'
    ];
    

    public function local()
{
    return $this->belongsTo(Local::class);
}

}
