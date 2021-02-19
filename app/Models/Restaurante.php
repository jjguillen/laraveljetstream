<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plato;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'ciudad', 'direccion', 'telefono', 'latitud', 'longitud'
    ];

    public function platos() {
        return $this->hasMany(Plato::class);
    }
}
