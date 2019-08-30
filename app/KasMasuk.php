<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    protected $table = 'kas_masuks';
    protected $fillable = ['user_id', 'shift_id', 'layanan_id', 'jumlah', 'total'];
}
