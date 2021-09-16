<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Utilisateur;

class Statut extends Model
{
    use HasFactory;

    public function utilisateurs():HasMany{
        return $this->hasMany(Utilisateur::class);
    }
}
