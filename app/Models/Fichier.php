<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Ao;

class Fichier extends Model
{
    use HasFactory;

    public function ao():BelongsTo{
        return $this->belongsTo(Ao::class);
    }
}
