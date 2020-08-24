<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang_pengiriman extends Model
{
    use Notifiable;
    use Uuid;
    protected $table = 'barang_pengirimans';


    public function barang_terjual()
    {
        return $this->belongsTo('App\Barang_terjual','terjual_id');
    }
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }
}
