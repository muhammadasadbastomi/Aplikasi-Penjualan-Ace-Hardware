<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Barang;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.items.sites.order')->with([
            'nama_order' => $this->data->nama_order,
            'alamat_order' => $this->data->alamat_order,
            'diskon_order' => $this->data->diskon_order,
            'total_order' => $this->data->total_order,
            'jumlah_order' => $this->data->jumlah_order,
            'harga_order' => $this->data->harga_order,
            'nama_barang' => $this->data->barang->nama_barang,
            'tgl_order' => $this->data->tgl_order,
            'harga_awal' => $this->data->barang->harga_jual,
        ]);
    }
}
