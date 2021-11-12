<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penghasilan extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'surat_penghasilan';
    protected $dates = ['deleted_at'];
    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class, 'id', 'id_pengajuan')->withTrashed();
    }
}
