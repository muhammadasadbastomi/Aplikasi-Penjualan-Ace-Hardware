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

    public function stok()
    {
        return $this->belongsTo(Stok::class);
    }
}
