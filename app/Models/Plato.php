<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurante;

class Plato extends Model
{
    use HasFactory;

    public function restaurante() {
        return $this->belongsTo(Restaurante::class, 'restaurante_id');
    }
}
