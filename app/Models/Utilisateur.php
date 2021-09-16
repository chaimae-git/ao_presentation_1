<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Utilisateur extends Model
{
    use HasFactory;

    public function statut():BelongsTo{
        return $this->belongsTo(Statut::class);
    }

    public function aos():BelongsToMany{
        return $this->belongsToMany(Ao::class,'ao_utilisateur', 'appel_offre_id');
    }
}
