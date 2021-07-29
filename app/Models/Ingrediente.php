<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    public function recetas() {
        $this->belongsToMany(Receta::class, 'ingrediente_recetas');
    }
}
