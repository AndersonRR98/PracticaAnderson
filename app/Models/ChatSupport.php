<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSupport extends Model
{
    /** @use HasFactory<\Database\Factories\ChatsSupportFactory> */
    use HasFactory;

    protected $table ='chats_supports';

       protected $fillable = ['mensaje', 'user_id', 'fecha_mensaje', 'atendido'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
