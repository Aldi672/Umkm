<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('oven_status')->delete();
        DB::table('order_items')->delete();
        DB::table('orders')->delete();
        DB::table('products')->delete();
        DB::table('categories')->delete();

        $catKue = DB::table('categories')->insertGetId(['name' => 'Kue Ulang Tahun', 'slug' => 'kue-ulang-tahun', 'created_at' => now(), 'updated_at' => now()]);
        $catPastry = DB::table('categories')->insertGetId(['name' => 'Pastry Harian', 'slug' => 'pastry-harian', 'created_at' => now(), 'updated_at' => now()]);
        $catKering = DB::table('categories')->insertGetId(['name' => 'Kue Kering', 'slug' => 'kue-kering', 'created_at' => now(), 'updated_at' => now()]);
        $catHantaran = DB::table('categories')->insertGetId(['name' => 'Paket Hantaran', 'slug' => 'paket-hantaran', 'created_at' => now(), 'updated_at' => now()]);

        $p1 = DB::table('products')->insertGetId([
            'category_id' => $catKue, 'name' => 'Basque Burnt Cheesecake 16cm', 'slug' => 'basque-burnt-cheesecake-16cm',
            'description' => 'Cream cheese Spanyol dipanggang tinggi, gurih smoky, lembut melted di tengah. 100% Wijsman.',
            'price' => 185000, 'badge_status' => 'Ready Stock', 'is_available' => true,
            'image_url' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&auto=format&fit=crop&q=80',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $p2 = DB::table('products')->insertGetId([
            'category_id' => $catPastry, 'name' => 'Parisian Croissant Box (4 pcs)', 'slug' => 'parisian-croissant-box',
            'description' => '100% French Butter Wijsman, 72 lapis renyah aroma karamel murni.',
            'price' => 95000, 'badge_status' => 'Ready Stock', 'is_available' => true,
            'image_url' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=600&auto=format&fit=crop&q=80',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $p3 = DB::table('products')->insertGetId([
            'category_id' => $catKue, 'name' => 'Black Forest Classic 20cm', 'slug' => 'black-forest-20cm',
            'description' => 'Cokelat Valrhona + cherry compote, krim segar. Pre-order H-1.',
            'price' => 295000, 'badge_status' => 'Pre-Order H-1', 'is_available' => true,
            'image_url' => 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=600&auto=format&fit=crop&q=80',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $p4 = DB::table('products')->insertGetId([
            'category_id' => $catPastry, 'name' => 'Artisanal Sourdough Loaf', 'slug' => 'artisanal-sourdough-loaf',
            'description' => 'Fermentasi alami 36 jam, renyah luar lembut kenyal dalam.',
            'price' => 55000, 'badge_status' => 'Ready Stock', 'is_available' => true,
            'image_url' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=600&auto=format&fit=crop&q=80',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $p5 = DB::table('products')->insertGetId([
            'category_id' => $catKering, 'name' => 'Nastar Wijsman Premium', 'slug' => 'nastar-wijsman',
            'description' => 'Nastar lumer isian nanas madu, buttery Wijsman.',
            'price' => 125000, 'badge_status' => 'Ready Stock', 'is_available' => true,
            'image_url' => 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=600&auto=format&fit=crop&q=80',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $p6 = DB::table('products')->insertGetId([
            'category_id' => $catHantaran, 'name' => 'Hampers Lebaran Sekar', 'slug' => 'hampers-lebaran-sekar',
            'description' => 'Paket hantaran premium: kukis, teh artisan, kartu hardcard.',
            'price' => 385000, 'badge_status' => 'Ready Stock', 'is_available' => true,
            'image_url' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?w=600&auto=format&fit=crop&q=80',
            'created_at' => now(), 'updated_at' => now(),
        ]);

        $oId = DB::table('orders')->insertGetId([
            'invoice_number' => 'AR-8821', 'customer_name' => 'Amanda Ramadhani', 'customer_phone' => '081289217731',
            'customer_email' => 'amanda@example.com', 'fulfillment_method' => 'delivery',
            'delivery_slot' => 'Hari Ini (Slot Pagi 09:00 - 12:00 WIB)', 'delivery_address' => 'Jl. Gandaria Tengah IV No. 18A, Jaksel',
            'chocolate_plaque' => 'Happy 25th Birthday Amanda ✨', 'cutlery_accessories' => json_encode(['Lilin Emas', 'Pisau Kayu', 'Kartu Hardcard']),
            'subtotal' => 280000, 'delivery_fee' => 20000, 'total_amount' => 300000,
            'payment_method' => 'qris', 'payment_status' => 'verified', 'status' => 'baking',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        DB::table('order_items')->insert([
            ['order_id' => $oId, 'product_id' => $p1, 'product_name' => 'Basque Burnt Cheesecake 16cm', 'price' => 185000, 'quantity' => 1, 'subtotal' => 185000, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => $oId, 'product_id' => $p2, 'product_name' => 'Parisian Croissant Box (4 pcs)', 'price' => 95000, 'quantity' => 1, 'subtotal' => 95000, 'created_at' => now(), 'updated_at' => now()],
        ]);
        DB::table('oven_status')->insert([
            'batch_name' => 'Batch Pagi #1 — Sourdough & Croissant',
            'temperature' => 220.4, 'remaining_minutes' => 14, 'status' => 'Active',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        // admin user untuk panel
        if (DB::table('users')->where('email', 'admin@aromarasa.test')->doesntExist()) {
            DB::table('users')->insert([
                'name' => 'Admin Aroma Rasa', 'email' => 'admin@aromarasa.test', 'password' => Hash::make('password'),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
        echo "seed ok\n";
    }
}
