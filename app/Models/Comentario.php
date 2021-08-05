<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        "contenido",
        "user_id",
        "receta_id",
        "puntuacion"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function receta() {
        return $this->belongsTo(Receta::class);
    }
}
