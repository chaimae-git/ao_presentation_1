<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partie extends Model
{
    use HasFactory;

    public function piece_a_preparers():HasMany{
        return $this->hasMany(Piece_a_preparer::class);
    }
}
