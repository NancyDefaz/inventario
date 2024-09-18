<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $table = 'locales';  // Nombre correcto de la tabla

    protected $fillable = ['nombre', 'ubicacion'];

    public function prendas()
    {
        return $this->hasMany(Prenda::class);
    }
}

