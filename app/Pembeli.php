<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pembeli extends Model
{
    use Notifiable;
    use Uuid;

    public function barang_garansi()
    {
        return $this->hasMany(Barang_garansi::class);
    }

    public function barang_pengiriman()
    {
        return $this->hasMany(Barang_pengiriman::class);
    }
    public function barang_terjual()
    {
        return $this->hasOne(Barang_terjual::class);
    }
}
