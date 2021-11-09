<?php

namespace App\Models\Surat;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BedaNama extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'surat_beda_nama';
    protected $dates = ['deleted_at'];
    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class, 'id', 'id_pengajuan')->withTrashed();
    }
}
