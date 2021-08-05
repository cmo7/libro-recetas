<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tiempo',
        'comensales',
        'dificultad',
        'proceso',
        'extracto',
        'imagen',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ingredientes() {
        return $this->belongsToMany(Ingrediente::class, "ingrediente_recetas")->withPivot('cantidad');
    }

    public function comentarios() {
        return $this->hasMany(Comentario::class);
    }
}
