<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use Notifiable;
    use Uuid;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
