<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = ['tanggal','user_id','shift_id','layanan_id','plat_nomor','jumlah','status'];
    protected $guarded = [];

    public static function join()
    {
        $data = DB::table('penjualan as a')
                ->join('users as b','a.user_id', '=', 'b.id_user')
                ->join('shift as c','a.shift_id', '=', 'c.id_shift')
                ->join('layanan as d','a.layanan_id', '=', 'd.id_layanan')
                ->get();
                return $data;
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
