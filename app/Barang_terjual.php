<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_terjual extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
