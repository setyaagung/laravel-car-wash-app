<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['nama', 'jenis_kelamin', 'job', 'alamat','no_hp', 'gaji'];
    use SoftDeletes;
}
