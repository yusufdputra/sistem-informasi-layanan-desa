<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'staff';
    protected $dates = ['deleted_at'];

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'id_jabatan')->withTrashed();
    }
}
