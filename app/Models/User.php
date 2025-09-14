<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class User extends Model
{
    use HasFactory;

   protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email', 
        'password',
        'activo',
        'rol_id' 
    ];
      protected $allowIncluded=[
        'role',
        'images.imageable',
        'publications.coments',
        'complaints',
        'seller.publications.images.imageable',
        'chats'
        ];

    protected $allowFilter=[
        'id',
       'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email', 
        'password',
        'activo',
        'created_at'];
        
    protected $allowSort=[
        'id',
       'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email', 
        'password',
        'activo',
        'created_at'];


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

    public function scopeIncluded(Builder $query): void
{
    $included = request('included');

    if (!$included || empty($this->allowIncluded)) {
        return;
    }
    // separa y filtra solo las relaciones permitidas
    $relations = collect(explode(',', $included))
        ->intersect($this->allowIncluded)
        ->toArray();

    if (!empty($relations)) {
        $query->with($relations);
    }
}


public function scopeFilter(Builder $query): void
{
    if (!request()->filled('filter') || empty($this->allowFilter)) return;

    foreach (request('filter') as $column => $value) {
        if (!in_array($column, $this->allowFilter)) continue;

        if (str_contains($column, '.')) {
            [$relation, $field] = explode('.', $column, 2);
            $query->whereHas($relation, fn($q) => $q->where($field, 'LIKE', "%$value%"));
        } elseif ($column === 'created_at') {
            $query->whereDate($column, $value);
        } else {
            $query->where($column, 'LIKE', "%$value%");
        }
    }
}

public function scopeSort(Builder $query): void
{
    if (!request()->filled('sort') || empty($this->allowSort)) return;

    foreach (explode(',', request('sort')) as $field) {
        $direction = str_starts_with($field, '-') ? 'desc' : 'asc';
        $field = ltrim($field, '-');

        if (!in_array($field, $this->allowSort)) continue;

        if (str_contains($field, '.')) {
            [$relation, $relationField] = explode('.', $field, 2);
            $query->with([$relation => fn($q) => $q->orderBy($relationField, $direction)]);
        } else {
            $query->orderBy($field, $direction);
        }
    }
}
   public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));

            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }

}

