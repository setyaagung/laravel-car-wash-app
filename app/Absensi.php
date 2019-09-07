<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensi extends Model
{
    use SoftDeletes;
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $fillable = ['tanggal', 'karyawan_id', 'jenis', 'keterangan', 'denda'];

    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'id_karyawan');
    }
}
