<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanggungan extends Model
{
    protected $table= 'tanggungan';
    protected $primaryKey = 'id_tanggungan';
    protected $fillable = ['karyawan_id','keterangan','jumlah', 'status'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}