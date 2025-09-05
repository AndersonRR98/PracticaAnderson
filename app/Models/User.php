<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

   protected $fillable = [
        'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido',
        'email', 'password', 'rol_id', 'activo'
    ];


    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function coments()
    {
        return $this->hasMany(Coment::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function chats()
    {
        return $this->hasMany(ChatSupport::class);
    }

    public function publications()
    {
        return $this->belongsToMany(Publication::class, 'publication_users');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
}

