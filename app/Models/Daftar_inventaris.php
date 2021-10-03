<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_inventaris extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penghapusan(){
        return $this->hasOne(Penghapusan_inventaris::class);
    }
}
