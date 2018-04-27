<?php

namespace App\Entities;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocial extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    public $table = 'user_socials';
    protected $fillable = ['user_id', 'social_network', 'social_id', 'social_email', 'social_avatar'];
    protected $hidden = ['password', 'remember_token'];
}
