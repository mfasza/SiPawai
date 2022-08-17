<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gaji', 'nip'
    ];

    /**
     * one to one relationship with gajis table
     * 
     * @var string
     */
    public function pegawais()
    {
        return $this->belongsTo(pegawai::class, 'nip', 'nip');
    }
}
