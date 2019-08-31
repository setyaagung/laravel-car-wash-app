<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    protected $table = 'shift';
    protected $fillable = ['nama_shift', 'mulai', 'selesai'];
    use SoftDeletes;
}
