<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function gestoresRestaurante() {
        return $this->hasMany(User::class)
                ->wherePivot('role', 'grestaurante');
    }
}
