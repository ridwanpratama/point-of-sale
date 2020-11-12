<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = "distributor";
    protected $primaryKey = "id";
    protected $fillable = 
    [
        'id','kd_distributor', 'nama_distributor', 'alamat', 'no_telp'
    ];

    public function distributor()
    {
        return $this->hasMany(Barang::class);
    }
}
