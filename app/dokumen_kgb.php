<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen_kgb extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_surat', 'tgl_kgb', 'file_loc', 'nip'
    ];

    /**
     * many to one relationship with pegawais table
     * 
     * @var string
     */
    public function pegawais()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }
}
