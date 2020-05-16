<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use Notifiable;
    use Uuid;

    public function gambar()
    {
        if (!$this->gambar) {
            return asset('images/default.png');
        }
        return asset('images/barang/' . $this->gambar);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function barang_datang()
    {
        return $this->HasMany(Barang_datang::class);
    }

    public function barang_rusak()
    {
        return $this->hasMany(Barang_rusak::class);
    }

    public function barang_terjual()
    {
        return $this->hasMany(Barang_terjual::class);
    }
    public function barang_pengiriman()
    {
        return $this->hasMany(Barang_pengiriman::class);
    }
    public function barang_garansi()
    {
        return $this->hasMany(Barang_garansi::class);
    }
}
