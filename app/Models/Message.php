<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // fonction qui précise que le message appartient à un seul utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // fonction qui précise la relation avec la table commentaires
    // on lui donne ce nom au pluriel car un message est lié à plusieurs commentaires
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
