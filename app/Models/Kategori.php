<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = ['nama'];

    /**
     * Get the gerakan (movements) associated with this category.
     */
    public function gerakan(): HasMany
    {
        return $this->hasMany(Gerakan::class, 'id_kategori');
    }
}
