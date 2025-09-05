<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    /** @use HasFactory<\Database\Factories\PublicationsFactory> */
    use HasFactory;

    
    protected $fillable = [
        'titulo', 'precio', 'descripcion', 'visibilidad',
        'seller_id', 'category_id'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function coments()
    {
        return $this->hasMany(Coment::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'publication_users');
    }
}

