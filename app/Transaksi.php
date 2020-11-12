<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = "transaksi";
    protected $primaryKey = "id";
    protected $fillable = 
    [
        'id', 'kd_transaksi', 'barang_id', 'user_id', 'jumlah_beli', 'total_harga', 'tanggal_beli'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
