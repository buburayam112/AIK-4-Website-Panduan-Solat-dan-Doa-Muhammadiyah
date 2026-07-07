<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gerakan extends Model
{
    protected $table = 'gerakan';

    protected $fillable = [
        'id_kategori',
        'nama',
        'urutan',
        'deskripsi',
        'gambar_url',
        'video_url',
    ];

    /**
     * Get the category that this movement belongs to.
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * Get the readings (bacaan) associated with this movement.
     */
    public function bacaan(): HasMany
    {
        return $this->hasMany(Bacaan::class, 'id_gerakan');
    }
}
