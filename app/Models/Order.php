<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'invoice_number', 'customer_name', 'customer_phone', 'customer_email',
        'fulfillment_method', 'delivery_slot', 'delivery_address',
        'chocolate_plaque', 'cutlery_accessories',
        'subtotal', 'delivery_fee', 'total_amount',
        'payment_method', 'payment_status', 'status', 'proof_of_payment',
    ];

    protected $casts = [
        'cutlery_accessories' => 'array',
        'subtotal' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateInvoiceNumber(): string
    {
        $date = now()->format('ymd');
        $count = self::whereDate('created_at', today())->count() + 1;

        return 'AR-'.$date.str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    public function getWhatsAppPayload(): string
    {
        $lines = [
            '✨ PESANAN BARU #'.$this->invoice_number.' ✨',
            '--------------------------------',
            '• Nama: '.$this->customer_name,
            '• WhatsApp: '.$this->customer_phone,
            '• Menu:',
        ];
        foreach ($this->items as $item) {
            $lines[] = '  - '.$item->quantity.'x '.$item->product_name.' (Rp '.number_format($item->subtotal, 0, ',', '.').')';
        }
        $lines[] = '• Metode: '.($this->fulfillment_method === 'pickup' ? 'Ambil Sendiri' : 'Kurir Termal Ice Pack (Rp '.number_format($this->delivery_fee, 0, ',', '.').')');
        $lines[] = '• Waktu Kirim: '.$this->delivery_slot;
        if ($this->delivery_address) {
            $label = $this->fulfillment_method === 'pickup' ? 'Titik Ambil' : 'Alamat';
            $lines[] = '• '.$label.': '.$this->delivery_address;
        }
        if ($this->chocolate_plaque) {
            $lines[] = '• Plakat Cokelat: "'.$this->chocolate_plaque.'"';
        }
        if ($this->cutlery_accessories && count($this->cutlery_accessories)) {
            $lines[] = '• Perlengkapan: '.implode(', ', $this->cutlery_accessories);
        }
        $lines[] = '• Total: Rp '.number_format($this->total_amount, 0, ',', '.').' (QRIS Terverifikasi)';
        $lines[] = '--------------------------------';
        $lines[] = 'Mohon konfirmasi jadwal oven dan pengiriman dapur Aroma Rasa. Terima kasih!';

        return implode("\n", $lines);
    }

    public function getWhatsAppUrl(): string
    {
        $payload = $this->getWhatsAppPayload();

        return 'https://wa.me/6285782749611?text='.urlencode($payload);
    }
}
