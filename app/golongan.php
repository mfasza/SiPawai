<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    /**
     * one to many relationship with pegawais table
     * 
     * @var string
     */
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'id_golongan', 'id');
    }
}
