<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

      protected $fillable = ['user_id', 'nombre', 'descripcion'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
       public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
