<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = 'tbl_kandidat';
    protected $fillable = ['nama', 'image', 'visi', 'misi', 'motto', 'organisasi'];

    public function pilihan(): HasMany
    {
        return $this->hasMany(Pilihan::class, 'id_kandidat', 'id');
    }
}
