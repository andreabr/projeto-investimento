<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'instituition_id'];

    public function getTotalValueAttribute()
    {
        return $this->moviments()->applications()->sum('value') - $this->moviments()->outflows()->sum('value');

    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id'); //se coloco a classe com nome diferente da tabela, preciso colocar a chave estrangeira.
    }

    public function users()
    {
        // RELACIONAMENTO N:N
        return $this->belongsToMany(User::class, 'user_groups');
    }


    public function instituition()
    {
        return $this->belongsTo(Instituition::class); // aqui não coloco pois o nome da classe é o mesmo da tabela
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

}

