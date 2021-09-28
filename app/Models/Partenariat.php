<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partenariat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function aos():BelongsToMany{
        return $this->belongsToMany(Ao::class, 'ao_partenariat', 'appel_offre_id');
    }
}
