<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $amac = ['bireysel', 'kurumsal'];
    public static $filesize = ['sınırsız', 'orta', 'buyuk', 'kucuk', 'free'];

    protected $fillable = [
        'firstname', 'lastname', 'profil', 'phone', 'amac', 'filesize', 'lisansbaslangictarihi', 'lisansbitistarihi', 'lisanslimi', 'email', 'password', 'access'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
