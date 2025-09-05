<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    /** @use HasFactory<\Database\Factories\ComentsFactory> */
    use HasFactory;

      protected $fillable = ['texto', 'valor_estrella', 'user_id', 'publication_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
