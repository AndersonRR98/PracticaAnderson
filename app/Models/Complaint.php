<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    /** @use HasFactory<\Database\Factories\ComplaintsFactory> */
    use HasFactory;
    
     protected $fillable = [
        'estado', 'descripcion_adicional',
        'user_id', 'publication_id', 'reason_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
