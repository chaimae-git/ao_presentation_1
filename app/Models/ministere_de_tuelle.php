<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ao;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ministere_de_tuelle extends Model
{
    use HasFactory;

    public function aos():HasMany{
        return $this->hasMany(Ao::class);
    }
}
