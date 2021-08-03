<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = [
        'nombre',
    ];
    use HasFactory;

    public function recetas() {
        return $this->belongsToMany(Receta::class, "ingrediente_recetas")->withPivot('cantidad');
    }
}


