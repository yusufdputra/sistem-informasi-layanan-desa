<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'pengajuan';
    protected $dates = ['deleted_at'];

    public function jenis_surat()
    {
        return $this->hasOne(Layanan::class, 'id', 'id_jenis_surat')->withTrashed();
    }

    public function warga()
    {
        return $this->hasOne(Warga::class, 'id', 'id_warga')->withTrashed();
    }
}
