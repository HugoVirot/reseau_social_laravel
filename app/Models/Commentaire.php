<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    // fonction qui précise que le commentaire appartient à un seul utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // fonction qui précise que le commentaire appartient à un seul message
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
