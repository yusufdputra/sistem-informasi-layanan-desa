<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usaha extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'surat_usaha';
    protected $dates = ['deleted_at'];
    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class, 'id', 'id_pengajuan')->withTrashed();
    }
}
