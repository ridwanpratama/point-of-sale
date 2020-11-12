<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = "merek";
    protected $primaryKey = "id";
    protected $fillable = 
    [
        'id','kd_merek', 'merek'
    ];

    public function merek()
    {
        return $this->hasMany(Barang::class);
    }
}
