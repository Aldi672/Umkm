<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->string('badge_status')->default('Ready Stock'); // Ready Stock, Pre-Order H-1
            $table->boolean('is_available')->default(true);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // e.g. AR-8821
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->enum('fulfillment_method', ['pickup', 'delivery']);
            $table->string('delivery_slot'); // e.g., "Slot Pagi (09:00 - 12:00 WIB)"
            $table->text('delivery_address')->nullable();
            $table->string('chocolate_plaque')->nullable();
            $table->json('cutlery_accessories')->nullable(); // ["Lilin Emas", "Pisau Kayu", ...]
            $table->decimal('subtotal', 12, 2);
            $table->decimal('delivery_fee', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);
            $table->string('payment_method')->default('qris'); // qris, bank_transfer
            $table->enum('payment_status', ['pending', 'verified'])->default('verified'); // auto verified per PRD
            $table->enum('status', ['pending', 'baking', 'decorating', 'delivering', 'completed'])->default('pending');
            $table->string('proof_of_payment')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('product_name');
            $table->decimal('price', 12, 2);
            $table->integer('quantity');
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
        });

        Schema::create('oven_status', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->decimal('temperature', 5, 1)->default(220.4);
            $table->integer('remaining_minutes')->default(14);
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('oven_status');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
