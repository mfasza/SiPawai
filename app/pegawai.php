<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'password', 'nip', 'jabatan', 'status', 'tmt_cpns', 'id_golongan'
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
     * override default primary key to nip column
     *
     * @var string
     */
    protected $primaryKey = 'nip';

    /**
     * one to one relationship with users table
     * 
     * @var string
     */
    public function user()
    {
        return $this->hasOne('App\Pegawai', 'users.nip', 'pegawais.nip');
    }
}
