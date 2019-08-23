<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = ['kategori', 'nama', 'harga'];
    use SoftDeletes;
}
