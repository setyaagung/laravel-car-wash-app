<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['nama', 'jenis_kelamin', 'job', 'alamat','no_hp', 'gaji', 'avatar'];
    use SoftDeletes;

    public function getAvatar()
    {
        if(!$this->avatar)
        {
            return asset('images/akun.png');
        }
        return asset('images/'. $this->avatar);
    }

    public function tanggungan()
    {
        return $this->hasMany(Tanggungan::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
