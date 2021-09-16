<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ao;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Concurrent extends Model
{
    use HasFactory;

    public function aos():BelongsToMany{
        return $this->belongsToMany(Ao::class);
    }
}
