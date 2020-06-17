<?php

namespace App\Mail;

use App\Barang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifDiskon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($d)
    {
        $this->d = $d;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $now = Carbon::now()->format('Y-m-d');
        $data = Barang::orderBy('tgl_aktif', 'asc')->where('tgl_aktif', '>=', $now)->get();
        $data = $data->map(function ($item) {
            $diskon = ($item->diskon / 100) * $item->harga_jual;
            $item['harga_diskon'] = number_format($item->harga_jual - $diskon, 0, ',', '.');
            return $item;
        });

        return $this->markdown('emails.sites.diskon', compact('data'))->with([
            'nama_pembeli' => $this->d->nama_pembeli,
            'tgl_pengiriman' => Carbon::now()->translatedFormat('d F Y'),
        ]);
    }
}
