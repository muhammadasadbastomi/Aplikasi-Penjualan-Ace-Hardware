<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang_terjual extends Model
{
    use Notifiable;
    use Uuid;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function barang_pengiriman()
    {
        return $this->hasOne(Barang_pengiriman::class);
    }
}
