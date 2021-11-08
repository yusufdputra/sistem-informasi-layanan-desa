<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'jenis_surat';
    protected $dates = ['deleted_at'];
}
