<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'nip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

    /**
     * one to one relationship with pegawais table
     * 
     * @var string
     */
    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'users.nip', 'pegawais.nip');
    }
}
