<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Role extends Model
{
    use HasFactory;

      protected $fillable = [
        'nombre',
        'permisos'];

       protected $allowIncluded=[
        'users',
        'users.publications.images.imageable',
        'users.coments',
        'users.complaints'
        ];

    protected $allowFilter=[
        'id',
        'nombre',
        'permisos',
        'created_at'];
        
    protected $allowSort=[
        'id',
        'nombre',
        'permisos',
        'created_at'];

    public function users()
    {
        return $this->hasMany(User::class , 'rol_id');
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
