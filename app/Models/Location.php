<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'adresse',
        'location',
        'ao_id'
    ];

    public function ao():BelongsTo{
        return $this->belongsTo(Ao::class);
    }
}
