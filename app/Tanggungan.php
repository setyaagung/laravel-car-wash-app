<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanggungan extends Model
{
    protected $table= 'tanggungan';
    protected $fillable = ['kategori'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class)->withPivot(['keterangan','jumlah','status']);
    }
}