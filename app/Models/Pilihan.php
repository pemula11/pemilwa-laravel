<?php

namespace App\Models;

use App\Models\Kandidat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pilihan extends Model
{
    use HasFactory;
    protected $table = 'tbl_pilihan';
    protected $fillable = ['id_kandidat', 'id_user'];


  
   public function kandidat()
   {
       return $this->belongsTo(Kandidat::class, 'id_kandidat', 'id');
   }
   public function user()
   {
       return $this->belongsTo(User::class, 'id_user', 'id');
   }

}

