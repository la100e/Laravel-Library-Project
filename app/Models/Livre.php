<?php

namespace App\Models;

use App\Models\Auteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    // use HasFactory;

    protected $fillable = ['isbn', 'titre', 'prix', 'quantite', 'description', 'auteur_id', 'categorie_id', 'image'];

    public function auteur () {
        return $this->belongsTo(Auteur::class);
    }
}
