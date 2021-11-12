<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KurangMampu extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'surat_kurang_mampu';
    protected $dates = ['deleted_at'];
    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class, 'id', 'id_pengajuan')->withTrashed();
    }
}