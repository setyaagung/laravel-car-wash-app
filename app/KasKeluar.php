<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class KasKeluar extends Model
{
    protected $table = 'kas_keluar';
    protected $primaryKey = 'id_kk';
    protected $fillable = ['tanggal','user_id', 'shift_id', 'tagihan_id', 'jumlah','ket'];

    public static function join()
    {
        $data = DB::table('kas_keluar as a')
                ->join('users as b','a.user_id', '=', 'b.id_user')
                ->join('shift as c','a.shift_id', '=', 'c.id_shift')
                ->join('tagihan as d','a.tagihan_id', '=', 'd.id_tagihan')
                ->get();
                return $data;
    }
}
