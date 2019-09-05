<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $fillable = ['kategori', 'nama_layanan', 'harga'];
    use SoftDeletes;

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

}
