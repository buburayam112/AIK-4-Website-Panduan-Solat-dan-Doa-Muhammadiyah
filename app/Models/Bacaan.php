<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bacaan extends Model
{
    protected $table = 'bacaan';

    protected $fillable = [
        'id_gerakan',
        'urutan',
        'teks_arab',
        'teks_latin',
        'terjemahan',
        'audio_url',
        'sumber',
    ];

    /**
     * Get the movement that this reading belongs to.
     */
    public function gerakan(): BelongsTo
    {
        return $this->belongsTo(Gerakan::class, 'id_gerakan');
    }
}
