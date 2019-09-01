<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    protected $table = 'kas_masuk';
    protected $primaryKey = 'id_km';
    protected $fillable = ['tanggal','user_id', 'shift_id', 'layanan_id','harga', 'jumlah', 'total'];

    public static function join()
    {
        $data = DB::table('kas_masuk as a')
                ->join('users as b','a.user_id', '=', 'b.id_user')
                ->join('shift as c','a.shift_id', '=', 'c.id_shift')
                ->join('layanan as d','a.layanan_id', '=', 'd.id_layanan')
                ->get();
                return $data;
    }

}
