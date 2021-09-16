<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fichier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pays;
use App\Models\ministere_de_tuelle;
use App\Models\Secteur_activite;
use App\Models\Concurrent;
use App\Models\Bu;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Testing\Fluent\Concerns\Has;

class Ao extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fichiers():HasMany{
        return $this->hasMany(Fichier::class);
    }

    public function type():BelongsTo{
        return $this->belongsTo(Type::class);
    }

    public function pays():BelongsTo{
        return $this->belongsTo(Pays::class);
    }

    public function ministere_de_tuelle():BelongsTo{
        return $this->belongsTo(ministere_de_tuelle::class, 'ministere_id');
    }

    public function secteur_activite():BelongsTo{
        return $this->belongsTo(Secteur_activite::class, 'secteur_id');
    }

    public function concurrents():BelongsToMany{
        return $this->belongsToMany(Concurrent::class, 'ao_concurent', 'appel_offre_id');
    }

    /****secretaire***/
    public function utilisateurs():BelongsToMany{
        return $this->belongsToMany(Utilisateur::class, 'ao_utilisateur', 'appel_offre_id')->withPivot('utilisateur_id');
    }

    public function bus():BelongsToMany{
        return $this->belongsToMany(Bu::class, 'ao_bu', 'appel_offre_id')->withPivot('bu_id');
    }

    public function departements():BelongsToMany{
        return $this->belongsToMany(Departement::class, 'ao_departement', 'appel_offre_id')->withPivot('departement_id');
    }

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }

    public function critere():BelongsTo{
        return $this->belongsTo(Critere_selection::class);
    }

    public function piece_a_preparers():HasMany{
        return $this->hasMany(Piece_a_preparer::class);
    }

    public function locations():HasMany{
        return $this->hasMany(Location::class);
    }
}
