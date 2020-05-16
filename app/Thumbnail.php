<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Thumbnail extends Model
{
    use Notifiable;
    use Uuid;
    protected $fillable = ['gambar', 'keterangan', 'judul'];
}
