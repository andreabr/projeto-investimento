<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    public $table = 'users';
    protected $fillable = ['cpf', 'name', 'telefone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'];
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttibute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute()
	{
		$cpf = $this->attributes['cpf'];
		return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 7, 3) . '-' . substr($cpf, -2);
	}
	public function getFormattedTelefoneAttribute()
	{
		$telefone = $this->attributes['telefone'];
		return "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 4) . "-" . substr($telefone, -4);
	}
	public function getFormattedBirthAttribute()
	{
		$birth = explode('-', $this->attributes['birth']);
		
		if(count( (array) $birth) != 3)
			return "";
		$birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];
		return $birth;
	}




}
