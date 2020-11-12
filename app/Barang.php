<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $fillable = 
    [
        'id', 'kd_barang', 'nama_barang', 'keterangan', 'tanggal_masuk', 'harga_barang', 'stok_barang', 'merek', 'nama_distributor', 'merek_id', 'distributor_id'
    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function barang()
    {
        return $this->hasMany(Transaksi::class);
    }
}
