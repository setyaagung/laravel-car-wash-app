<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    protected $table = 'kas_masuks';
    protected $fillable = ['id_km','tanggal','user_id', 'shift_id', 'layanan_id','harga', 'jumlah', 'total'];

    public static function join()
    {
        $data = DB::table('kas_masuks as a')
                ->join('users as b','a.user_id', '=', 'b.id')
                ->join('shift as c','a.shift_id', '=', 'c.id')
                ->join('layanan as d','a.layanan_id', '=', 'd.id')
                ->get();
                return $data;
    }

}
