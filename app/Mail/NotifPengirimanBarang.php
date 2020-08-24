<?php

namespace App\Mail;

use App\Barang_pengiriman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifPengirimanBarang extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($barangpengiriman)
    {
        $this->barangpengiriman = $barangpengiriman;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sites.pengiriman')->with([
            'status' => $this->barangpengiriman->status,
            'nama_pembeli' => $this->barangpengiriman->pembeli->nama_pembeli,
            'nama_barang' => $this->barangpengiriman->barang_terjual->barang->nama_barang,
            'kode' => $this->barangpengiriman->kode_pengiriman,
            'tgl_pengiriman' => Carbon::now()->translatedFormat('l, d F Y'),
        ]);
    }
}
