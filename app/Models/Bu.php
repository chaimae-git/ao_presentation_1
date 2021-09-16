<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Ao;

class Bu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function departements():HasMany{
        return $this->hasMany(Departement::class);
    }


    public function aos():BelongsToMany{
        return $this->belongsToMany(Ao::class, 'ao_bu', 'appel_offre_id');
    }
}
