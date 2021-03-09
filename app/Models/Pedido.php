<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LineaPedido;

class Pedido extends Model
{
    use HasFactory;

    public function lineasPedido() {
        return $this->belongsToMany(LineaPedido::class, 'linea_pedidos', 'pedido_id', 'plato_id')->withTimestamps();
    }
}
