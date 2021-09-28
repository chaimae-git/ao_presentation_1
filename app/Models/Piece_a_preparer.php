<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Piece_a_preparer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ao():BelongsTo{
        return $this->belongsTo(Ao::class);
    }

    public function partie():BelongsTo{
        return $this->belongsTo(Partie::class);
    }
}
