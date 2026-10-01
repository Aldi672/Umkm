<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public const CUTOFF_HOUR = 14;

    public const SLOT_QUOTAS = [
        'Hari Ini (Slot Pagi 09:00 - 12:00 WIB)' => 20,
        'Hari Ini (Slot Sore 15:00 - 18:00 WIB)' => 20,
        'Besok (Slot Pagi 09:00 - 12:00 WIB)' => 30,
        'Besok (Slot Sore 15:00 - 18:00 WIB)' => 30,
    ];

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => ['required', 'regex:/^\d{10,13}$/'],
            'customer_email' => 'nullable|email',
            'fulfillment_method' => 'required|in:pickup,delivery',
            'delivery_slot' => 'required|string|in:'.implode(',', array_keys(self::SLOT_QUOTAS)),
            'delivery_address' => 'required_if:fulfillment_method,delivery|string',
            'chocolate_plaque' => 'nullable|string|max:255',
            'cutlery_accessories' => 'nullable|array',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $slot = $validated['delivery_slot'];

        if (str_starts_with($slot, 'Hari Ini') && now()->hour >= self::CUTOFF_HOUR) {
            return response()->json([
                'message' => 'Cut-off 14:00 WIB terlewati — slot Hari Ini tutup, pilih slot Besok.',
            ], 422);
        }

        $quota = self::SLOT_QUOTAS[$slot];
        $used = Order::where('delivery_slot', $slot)
            ->whereDate('created_at', today())
            ->count();

        if ($used >= $quota) {
            return response()->json([
                'message' => "Kuota {$slot} penuh ({$quota} order) — pilih slot lain.",
            ], 422);
        }

        return DB::transaction(function () use ($validated) {
            $subtotal = 0;
            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                $subtotal += $product->price * $item['quantity'];
            }
            $deliveryFee = $validated['fulfillment_method'] === 'delivery' ? 20000 : 0;

            $order = Order::create([
                'invoice_number' => Order::generateInvoiceNumber(),
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'customer_email' => $validated['customer_email'] ?? null,
                'fulfillment_method' => $validated['fulfillment_method'],
                'delivery_slot' => $validated['delivery_slot'],
                'delivery_address' => $validated['delivery_address'] ?? null,
                'chocolate_plaque' => $validated['chocolate_plaque'] ?? null,
                'cutlery_accessories' => $validated['cutlery_accessories'] ?? [],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total_amount' => $subtotal + $deliveryFee,
                'payment_method' => 'qris',
                'payment_status' => 'verified',
                'status' => 'pending',
            ]);

            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->price * $item['quantity'],
                ]);
            }

            // Trigger n8n
            if (config('services.n8n.webhook_url')) {
                Http::withHeaders(['X-Webhook-Secret' => config('services.n8n.webhook_secret')])
                    ->post(config('services.n8n.webhook_url'), $order->toArray());
            }

            return response()->json([
                'invoice' => $order->invoice_number,
                'total' => $order->total_amount,
                'whatsapp_url' => $order->getWhatsAppUrl(),
            ], 201);
        });
    }

    public function show(string $invoice)
    {
        $order = Order::where('invoice_number', $invoice)->firstOrFail();
        $stageMap = ['pending' => 1, 'baking' => 2, 'decorating' => 3, 'delivering' => 4, 'completed' => 5];

        return response()->json([
            'invoice' => $order->invoice_number,
            'status' => $order->status,
            'stage' => $stageMap[$order->status] ?? 0,
            'temperature' => 220.4,
            'remaining_minutes' => 14,
            'whatsapp_url' => $order->getWhatsAppUrl(),
        ]);
    }

    public function track(string $invoice)
    {
        return $this->show($invoice);
    }
}
