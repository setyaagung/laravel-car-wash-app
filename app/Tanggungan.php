<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanggungan extends Model
{
    use SoftDeletes;
    protected $table = 'tanggungan';
    protected $primaryKey = 'id_tanggungan';
    protected $fillable = ['tanggal', 'karyawan_id', 'keterangan', 'jumlah', 'status'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'id_karyawan');
    }
}
