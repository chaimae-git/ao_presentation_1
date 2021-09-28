<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Bu;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Departement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Bu():BelongsTo{
        return $this->belongsTo(Bu::class);
    }

    public function aos():BelongsToMany{
        return $this->belongsToMany(Ao::class,'ao_departement', 'appel_offre_id');
    }
}
