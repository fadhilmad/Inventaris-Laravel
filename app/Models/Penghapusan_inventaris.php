<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghapusan_inventaris extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function daftar_inventaris(){
        return $this->hasOne(Daftar_inventaris::class, 'id', 'id_daftar_inventaris');
    }
}
