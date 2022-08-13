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
    public function users()
    {
        return $this->hasOne(User::class, 'nip', 'nip');
    }

    /**
     * many to one relationship with golongans table
     * 
     * @var string
     */
    public function golongans()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id');
    }
    
    /**
     * one to many relationship with dokumen_kgbs table
     * 
     * @var string
     */
    public function kgbs()
    {
        return $this->hasMany(dokumen_kgb::class, 'nip', 'nip');
    }
}
