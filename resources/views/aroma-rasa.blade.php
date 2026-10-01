<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aroma Rasa — Artisanal Patisserie</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
@vite(['resources/css/app.css','resources/js/app.js'])
<style>
*{font-family:'Plus Jakarta Sans',Inter,system-ui,sans-serif}
.font-display{font-family:'Playfair Display',serif}
.font-mono{font-family:'JetBrains Mono',monospace}
:where(button,a,input,select,textarea):focus-visible{outline:2px solid #D96B27;outline-offset:2px}
</style>
</head>
<body class="bg-[#FDF9F3] text-[#2B1D14] antialiased">

<!-- Announcement -->
<div class="bg-[#FDF2E9] border-b border-[#E8E1D5] text-[12px] leading-[1.5] text-[#4A3C31] px-4 py-2 text-center">
<span class="inline-flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-[#D96B27] animate-pulse"></span>
Batch Pagi oven menyala — cut-off pesanan hari ini <b>14:00 WIB</b> · Slot Pagi 09:00-12:00 tersisa 6 · Slot Sore 15:00-18:00 tersisa 11
</span>
</div>

<!-- Header -->
<header class="sticky top-0 z-40 bg-[#FDF9F3]/90 backdrop-blur border-b border-[#E8E1D5]">
<div class="max-w-[1160px] mx-auto px-4 h-[64px] flex items-center justify-between gap-4">
<a href="#" class="flex items-center gap-3">
<div class="w-9 h-9 rounded-[8px] bg-[#2B1D14] text-white grid place-items-center font-display font-bold text-[16px]">AR</div>
<div class="leading-tight">
<div class="font-display font-bold text-[18px] tracking-[-0.02em]">Aroma Rasa</div>
<div class="text-[11px] tracking-[0.14em] text-[#7C6E64] uppercase font-semibold -mt-1">Artisanal Patisserie</div>
</div>
</a>
<nav class="hidden md:flex items-center gap-6 text-[14px] font-medium text-[#4A3C31]">
<a href="#katalog" class="hover:text-[#2B1D14]">Katalog</a>
<a href="#cara-pesan" class="hover:text-[#2B1D14]">Cara Pesan</a>
<a href="#lacak" class="hover:text-[#D96B27]">Lacak Pesanan</a>
</nav>
<div class="flex items-center gap-2">
<button id="btn-tracker" class="hidden sm:inline-flex h-9 px-4 rounded-[8px] border border-[#E8E1D5] bg-white text-[13px] font-semibold hover:bg-[#F7F3EB] active:bg-[#E8E1D5]">Lacak AR-XXXX</button>
<button id="btn-cart" class="relative inline-flex items-center gap-2 h-9 px-4 rounded-full bg-[#2B1D14] text-white text-[13px] font-semibold hover:bg-black active:bg-[#1a110c]">
<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 6h15l-1.5 9h-13z"/><path d="M6 6L5 2H2"/><circle cx="9" cy="20" r="1.8"/><circle cx="18" cy="20" r="1.8"/></svg>
Keranjang <span id="cart-count" class="bg-white text-[#2B1D14] rounded-full px-1.5 py-0.5 text-[11px] font-bold leading-none">0</span>
</button>
</div>
</div>
</header>

<!-- Hero -->
<section class="max-w-[1160px] mx-auto px-4 pt-8 pb-6 grid lg:grid-cols-[1.05fr_0.95fr] gap-8 items-center">
<div>
<div class="inline-flex items-center gap-2 text-[12px] font-semibold tracking-[0.08em] uppercase text-[#335C3D] bg-[#EAF4EC] border border-[#E8E1D5] px-3 py-1 rounded-full">100% Wijsman Butter · Halal MUI · Tanpa Pengawet</div>
<h1 class="font-display font-bold text-[32px] lg:text-[44px] leading-[1.1] tracking-[-0.03em] mt-4">Kue artisanal<br><span class="text-[#D96B27]">panggang hari ini,</span><br>langsung ke meja Anda.</h1>
<p class="text-[15px] leading-[1.6] text-[#4A3C31] mt-3 max-w-[520px]">Etalase harian toko kue UMKM — pesan tanpa daftar akun. Identitas Anda hanya <b>nama + WA</b>, konfirmasi via WhatsApp, bayar QRIS instan.</p>
<div class="flex flex-wrap gap-3 mt-5">
<a href="#katalog" class="inline-flex h-11 px-6 rounded-[8px] bg-[#D96B27] text-white font-semibold text-[14px] items-center hover:bg-[#C25B1D] active:bg-[#A84E18]">Pesan Sekarang</a>
<a href="#lacak" class="inline-flex h-11 px-6 rounded-[8px] bg-white border border-[#E8E1D5] font-semibold text-[14px] items-center hover:bg-[#F7F3EB] active:bg-[#E8E1D5]">Lacak Pesanan</a>
</div>
<div class="flex items-center gap-3 mt-6 text-[13px] text-[#7C6E64]">
<span class="inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-[#335C3D]"></span> Dapur buka 07:00–18:00 WIB</span>
<span class="w-px h-4 bg-[#E8E1D5]"></span>
<span>Estimasi siap 90–150 menit</span>
</div>
</div>
<div class="relative">
<img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=860&auto=format&fit=crop&q=80" alt="kue artisanal" class="w-full h-[360px] lg:h-[420px] object-cover rounded-[16px] border border-[#E8E1D5] shadow-[0_8px_24px_rgba(43,29,20,0.08)]">
<div class="absolute -bottom-4 -left-2 lg:left-auto lg:-right-2 bg-white border border-[#E8E1D5] rounded-[12px] shadow-[0_8px_24px_rgba(43,29,20,0.10)] p-3 flex items-center gap-3">
<img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=120&auto=format&fit=crop&q=80" class="w-14 h-14 rounded-[8px] object-cover">
<div class="pr-2">
<div class="text-[12px] font-semibold tracking-wide uppercase text-[#7C6E64]">Best Seller Hari Ini</div>
<div class="text-[14px] font-semibold leading-tight">Basque Burnt Cheesecake</div>
<div class="text-[13px] text-[#D96B27] font-bold">Rp 185.000 · Ready Stock</div>
</div>
</div>
</div>
</section>

<!-- Live Oven -->
<section class="max-w-[1160px] mx-auto px-4">
<div id="oven-card" class="bg-white border border-[#E8E1D5] rounded-[12px] p-4 flex flex-wrap items-center justify-between gap-4 shadow-[0_1px_3px_rgba(43,29,20,0.05)]">
<div class="flex items-center gap-3">
<span class="w-9 h-9 rounded-full bg-[#FDF2E9] border border-[#E8E1D5] grid place-items-center">🔥</span>
<div>
<div class="text-[13px] font-bold tracking-wide">Live Oven — <span id="oven-batch">Batch Pagi #1 — Sourdough & Croissant</span></div>
<div class="text-[12px] text-[#7C6E64]">Suhu <b id="oven-temp" class="text-[#2B1D14]">220.4°C</b> · sisa <b id="oven-min" class="text-[#2B1D14]">14 menit</b> · <span class="inline-flex items-center gap-1"><span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> Active</span></div>
</div>
</div>
<div class="flex items-center gap-3">
<div class="text-right hidden sm:block">
<div class="text-[11px] tracking-[0.08em] uppercase font-semibold text-[#7C6E64]">Kapasitas Oven Deck</div>
<div class="text-[13px] font-semibold">82% terpakai · 18% tersisa</div>
</div>
<div class="w-28 h-2 bg-[#F7F3EB] rounded-full overflow-hidden border border-[#E8E1D5]"><div class="h-full bg-[#D96B27] rounded-full" style="width:82%"></div></div>
</div>
</div>
</section>

<!-- Katalog -->
<section id="katalog" class="max-w-[1160px] mx-auto px-4 pt-8">
<div class="flex items-end justify-between gap-4">
<div>
<h2 class="font-display font-bold text-[28px] leading-[1.2] tracking-[-0.02em]">Katalog Hari Ini</h2>
<p class="text-[13px] text-[#7C6E64] mt-1">6 produk · Ready Stock & Pre-Order H-1 · Harga transparan, tanpa biaya tersembunyi</p>
</div>
<div class="hidden sm:flex items-center gap-2 text-[13px]">
<button data-cat="all" class="cat-tab h-8 px-4 rounded-full bg-[#2B1D14] text-white font-semibold">Semua</button>
<button data-cat="Kue Ulang Tahun" class="cat-tab h-8 px-4 rounded-full bg-white border border-[#E8E1D5] hover:bg-[#F7F3EB]">Kue Ulang Tahun</button>
<button data-cat="Pastry Harian" class="cat-tab h-8 px-4 rounded-full bg-white border border-[#E8E1D5] hover:bg-[#F7F3EB]">Pastry</button>
<button data-cat="Kue Kering" class="cat-tab h-8 px-4 rounded-full bg-white border border-[#E8E1D5] hover:bg-[#F7F3EB]">Kue Kering</button>
</div>
</div>
<div id="product-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-5">
<!-- JS render -->
<div class="col-span-full text-center py-12 text-[#7C6E64] text-[14px]">Memuat katalog…</div>
</div>
</section>

<!-- 3 Langkah -->
<section id="cara-pesan" class="max-w-[1160px] mx-auto px-4 pt-10">
<div class="bg-white border border-[#E8E1D5] rounded-[12px] p-6 grid md:grid-cols-3 gap-6">
<div>
<div class="w-8 h-8 rounded-full bg-[#2B1D14] text-white grid place-items-center text-[13px] font-bold">1</div>
<h3 class="font-semibold text-[15px] mt-3">Pilih kue & tambah keranjang</h3>
<p class="text-[13px] leading-[1.6] text-[#7C6E64] mt-1">Tanpa login. Lihat bahan, porsi, lead time, dan stok real-time.</p>
</div>
<div>
<div class="w-8 h-8 rounded-full bg-[#D96B27] text-white grid place-items-center text-[13px] font-bold">2</div>
<h3 class="font-semibold text-[15px] mt-3">Isi nama + WA + alamat/slot</h3>
<p class="text-[13px] leading-[1.6] text-[#7C6E64] mt-1">Identity-as-Order: 6–8 field saja. WA 10–13 digit jadi ID pesanan.</p>
</div>
<div>
<div class="w-8 h-8 rounded-full bg-[#335C3D] text-white grid place-items-center text-[13px] font-bold">3</div>
<h3 class="font-semibold text-[15px] mt-3">Bayar QRIS & kirim WA</h3>
<p class="text-[13px] leading-[1.6] text-[#7C6E64] mt-1">QRIS terverifikasi otomatis, payload WA terformat rapi siap kirim.</p>
</div>
</div>
</section>

<!-- Checkout -->
<section id="checkout" class="max-w-[1160px] mx-auto px-4 pt-10 pb-6">
<h2 class="font-display font-bold text-[24px]">Checkout — tanpa daftar akun</h2>
<p class="text-[13px] text-[#7C6E64] mt-1">Lengkapi 6–8 field di bawah. Total transparan di kanan. Tombol besar hijau di bawah untuk kirim via WhatsApp.</p>

<div class="grid lg:grid-cols-[1.45fr_0.85fr] gap-6 mt-5">
<!-- Form -->
<form id="checkout-form" class="bg-white border border-[#E8E1D5] rounded-[12px] p-5 lg:p-6 space-y-5" novalidate>
<div class="grid sm:grid-cols-2 gap-4">
<label class="block"> <span class="text-[13px] font-semibold">Nama lengkap *</span>
<input id="f-name" type="text" placeholder="Amanda Ramadhani" class="mt-1 w-full h-10 px-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] placeholder:text-[#A89C92] text-[14px]" required minlength="3">
<p class="text-[11px] text-[#7C6E64] mt-1">Untuk faktur & label kemasan</p>
</label>
<label class="block"> <span class="text-[13px] font-semibold">Nomor WhatsApp *</span>
<input id="f-phone" type="tel" inputmode="numeric" placeholder="081289217731" pattern="\d{10,13}" class="mt-1 w-full h-10 px-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] placeholder:text-[#A89C92] text-[14px]" required>
<p class="text-[11px] text-[#7C6E64] mt-1">10–13 digit, tanpa spasi/strip</p>
</label>
</div>
<label class="block"> <span class="text-[13px] font-semibold">Email (opsional)</span>
<input id="f-email" type="email" placeholder="amanda@email.com" class="mt-1 w-full h-10 px-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] placeholder:text-[#A89C92] text-[14px]">
</label>

<div class="border-t border-[#E8E1D5] pt-5">
<div class="text-[13px] font-semibold">Metode pemenuhan *</div>
<div class="grid grid-cols-2 gap-3 mt-2">
<label class="flex items-center gap-3 p-3 rounded-[8px] border-2 cursor-pointer has-[input:checked]:border-[#D96B27] has-[input:checked]:bg-[#FDF2E9] border-[#E8E1D5] bg-[#F7F3EB]">
<input type="radio" name="fulfillment" value="pickup" class="accent-[#D96B27]"> <span class="text-[14px] font-medium">Ambil di Toko</span>
</label>
<label class="flex items-center gap-3 p-3 rounded-[8px] border-2 cursor-pointer has-[input:checked]:border-[#335C3D] has-[input:checked]:bg-[#EAF4EC] border-[#E8E1D5] bg-[#F7F3EB]">
<input type="radio" name="fulfillment" value="delivery" checked class="accent-[#335C3D]"> <span class="text-[14px] font-medium">Kurir Termal Ice Pack</span>
</label>
</div>
</div>

<label class="block"> <span class="text-[13px] font-semibold">Slot waktu *</span>
<select id="f-slot" class="mt-1 w-full h-10 px-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] text-[14px]">
<option>Hari Ini (Slot Pagi 09:00 - 12:00 WIB)</option>
<option>Hari Ini (Slot Sore 15:00 - 18:00 WIB)</option>
<option>Besok (Slot Pagi 09:00 - 12:00 WIB)</option>
<option>Besok (Slot Sore 15:00 - 18:00 WIB)</option>
</select>
<p class="text-[11px] text-[#7C6E64] mt-1">Cegah penumpukan dapur — pilih slot tersedia</p>
</label>

<label id="wrap-address" class="block"> <span id="label-address" class="text-[13px] font-semibold">Alamat pengiriman *</span>
<input id="f-address" type="text" placeholder="Jl. Gandaria Tengah IV No. 18A, Jaksel" class="mt-1 w-full h-10 px-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] placeholder:text-[#A89C92] text-[14px]">
<p id="hint-address" class="text-[11px] text-[#7C6E64] mt-1">Alamat lengkap untuk kurir</p>
</label>

<label class="block"> <span class="text-[13px] font-semibold">Tulisan plakat cokelat (opsional, max 50)</span>
<textarea id="f-plaque" maxlength="50" rows="2" placeholder="Happy 25th Birthday Amanda ✨" class="mt-1 w-full px-3 py-2 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] placeholder:text-[#A89C92] text-[14px]"></textarea>
<div class="text-right text-[11px] text-[#7C6E64]"><span id="plaque-count">0</span>/50</div>
</label>

<fieldset class="block">
<legend class="text-[13px] font-semibold">Perlengkapan gratis</legend>
<div class="grid grid-cols-2 gap-2 mt-2 text-[13px]">
<label class="flex items-center gap-2"><input type="checkbox" value="Lilin Emas" class="acc"> Lilin Emas</label>
<label class="flex items-center gap-2"><input type="checkbox" value="Pisau Kayu" class="acc"> Pisau Kayu</label>
<label class="flex items-center gap-2"><input type="checkbox" value="Kartu Hardcard" class="acc"> Kartu Hardcard</label>
<label class="flex items-center gap-2"><input type="checkbox" value="Lilin Angka" class="acc"> Lilin Angka</label>
</div>
</fieldset>

<div class="border-t border-[#E8E1D5] pt-4">
<div class="text-[13px] font-semibold">Pembayaran</div>
<div class="mt-2 flex items-center gap-3 p-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB]">
<span class="w-10 h-10 rounded-[8px] bg-white border border-[#E8E1D5] grid place-items-center text-[18px]">◈</span>
<div class="text-[13px]"><b>QRIS</b> — scan nominal pas, terverifikasi otomatis <span class="inline-flex items-center gap-1 ml-1 text-[#335C3D] font-semibold"><span class="w-2 h-2 rounded-full bg-[#335C3D]"></span> SSL Secure</span></div>
</div>
<div class="mt-2 text-[11px] text-[#7C6E64]">Ongkir flat Rp 20.000 untuk delivery · Gratis untuk pickup</div>
</div>

<div id="form-error" class="hidden text-[13px] text-red-700 bg-red-50 border border-red-200 rounded-[8px] px-3 py-2"></div>

<button id="btn-submit" type="submit" class="w-full h-12 rounded-[8px] bg-[#335C3D] text-white font-bold text-[15px] inline-flex items-center justify-center gap-2 hover:bg-[#274830] active:bg-[#1e3524] disabled:opacity-50 disabled:cursor-not-allowed">
<span id="btn-submit-label">Checkout via WhatsApp — Bayar QRIS</span>
<span id="btn-submit-spinner" class="hidden w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></span>
</button>
<p class="text-center text-[11px] text-[#7C6E64]">Dengan menekan tombol, Anda menyetujui pemrosesan Identity-as-Order (nama + WA) sebagai profil pesanan.</p>
</form>

<!-- Summary sticky -->
<div class="lg:sticky lg:top-[76px] h-fit space-y-4">
<div class="bg-white border border-[#E8E1D5] rounded-[12px] p-5">
<h3 class="font-semibold text-[15px]">Ringkasan Pesanan</h3>
<div id="summary-items" class="mt-3 space-y-3 text-[13px] text-[#4A3C31]">Keranjang kosong — tambah produk di atas.</div>
<div class="border-t border-[#E8E1D5] mt-4 pt-4 space-y-2 text-[13px]">
<div class="flex justify-between"><span class="text-[#7C6E64]">Subtotal</span><span id="sum-sub" class="font-semibold">Rp 0</span></div>
<div class="flex justify-between"><span class="text-[#7C6E64]">Ongkir</span><span id="sum-fee" class="font-semibold">Rp 0</span></div>
<div class="flex justify-between text-[15px] font-bold"><span>Total</span><span id="sum-total">Rp 0</span></div>
</div>
<div class="mt-3 rounded-[8px] bg-[#FDF2E9] border border-[#E8E1D5] p-3">
<div class="text-[12px] font-semibold">QRIS Nominal Pas</div>
<div class="font-mono text-[12px] text-[#4A3C31] mt-1 break-all">Bayar sesuai total di atas. Upload bukti tidak wajib — status otomatis Terverifikasi.</div>
<div class="mt-2 w-full h-32 rounded-[8px] bg-white border border-dashed border-[#D4C9B8] grid place-items-center text-[12px] text-[#7C6E64]">QR Code (mock) — nominal menyesuaikan total</div>
</div>
<div class="mt-3 rounded-[8px] bg-[#F7F3EB] border border-[#E8E1D5] p-3">
<div class="text-[12px] font-semibold">Preview pesan WhatsApp</div>
<pre id="wa-preview" class="font-mono text-[11px] leading-[1.5] whitespace-pre-wrap break-words mt-2 text-[#4A3C31] bg-white border border-[#E8E1D5] rounded-[8px] p-3 max-h-[220px] overflow-auto">Isi keranjang dulu untuk melihat preview.</pre>
</div>
</div>
</div>
</div>
</section>

<!-- Tracker -->
<section id="lacak" class="max-w-[1160px] mx-auto px-4 pt-4 pb-8">
<div class="bg-white border border-[#E8E1D5] rounded-[12px] p-6">
<h2 class="font-display font-bold text-[22px]">Lacak Pesanan — tanpa login</h2>
<p class="text-[13px] text-[#7C6E64] mt-1">Masukkan No. Invoice (mis. AR-8821). Contoh demo terisi otomatis.</p>
<div class="flex flex-wrap gap-3 mt-4">
<input id="track-invoice" value="AR-8821" placeholder="AR-XXXX" class="h-10 px-3 rounded-[8px] border border-[#E8E1D5] bg-[#F7F3EB] text-[14px] font-mono w-[220px]">
<button id="btn-track" class="h-10 px-5 rounded-[8px] bg-[#2B1D14] text-white font-semibold text-[13px] hover:bg-black active:bg-[#1a110c]">Lacak Status</button>
<span id="track-error" class="hidden text-[13px] text-red-700"></span>
</div>
<div id="track-result" class="hidden mt-6 border-t border-[#E8E1D5] pt-6">
<div class="flex flex-wrap items-center gap-3">
<span class="text-[13px] font-semibold">Invoice <span id="tr-invoice" class="font-mono">#AR-8821</span></span>
<span id="tr-badge" class="px-2.5 py-1 rounded-full text-[12px] font-bold bg-[#FDF2E9] border border-[#E8E1D5] text-[#D96B27]">Baking</span>
<span class="text-[12px] text-[#7C6E64]">Suhu oven <b id="tr-temp" class="text-[#2B1D14]">220.4°C</b> · sisa <b id="tr-min" class="text-[#2B1D14]">14 menit</b></span>
</div>
<!-- stepper -->
<div class="grid grid-cols-4 gap-2 mt-5">
<div class="text-center"><div class="w-8 h-8 mx-auto rounded-full bg-[#335C3D] text-white grid place-items-center text-[13px] font-bold">✓</div><div class="text-[11px] font-semibold mt-2">Diterima & Terverifikasi</div><div class="text-[11px] text-[#7C6E64]">QRIS lunas</div></div>
<div class="text-center"><div id="step-2" class="w-8 h-8 mx-auto rounded-full bg-[#D96B27] text-white grid place-items-center text-[13px] font-bold animate-pulse">2</div><div class="text-[11px] font-semibold mt-2">Dipanggang di Oven</div><div class="text-[11px] text-[#7C6E64]">220.4°C · 14m</div></div>
<div class="text-center"><div class="w-8 h-8 mx-auto rounded-full bg-white border-2 border-[#E8E1D5] text-[#A89C92] grid place-items-center text-[13px] font-bold">3</div><div class="text-[11px] font-semibold mt-2">Dekorasi & Dingin</div><div class="text-[11px] text-[#7C6E64]">Plakat & glaze</div></div>
<div class="text-center"><div class="w-8 h-8 mx-auto rounded-full bg-white border-2 border-[#E8E1D5] text-[#A89C92] grid place-items-center text-[13px] font-bold">4</div><div class="text-[11px] font-semibold mt-2">Kurir Termal</div><div class="text-[11px] text-[#7C6E64]">Siap kirim</div></div>
</div>
<div class="mt-5 rounded-[8px] bg-[#FDF9F3] border border-[#E8E1D5] p-3 text-[13px] leading-[1.6]">
<b>Catatan dapur — Baker Siti:</b> Adonan sourdough proofing 36 jam selesai, croissant laminasi 72 lapis siap masuk deck 2. Plakat cokelat akan ditulis setelah suhu turun.
</div>
<a id="tr-wa" href="#" target="_blank" class="mt-4 inline-flex h-10 px-5 rounded-[8px] bg-[#335C3D] text-white font-semibold text-[13px] items-center gap-2 hover:bg-[#274830]">💬 Buka WhatsApp Toko</a>
</div>
</div>
</section>

<!-- Admin (simple) -->
<section id="admin" class="max-w-[1160px] mx-auto px-4 pb-8 hidden">
<div class="bg-white border border-[#E8E1D5] rounded-[12px] p-6">
<h2 class="font-display font-bold text-[20px]">Panel Admin — Operasional Dapur</h2>
<div class="grid grid-cols-2 lg:grid-cols-5 gap-3 mt-4">
<div class="rounded-[8px] bg-[#F7F3EB] border border-[#E8E1D5] p-3"><div class="text-[11px] uppercase tracking-wide font-semibold text-[#7C6E64]">Total Pesanan</div><div id="adm-total" class="text-[20px] font-bold">—</div></div>
<div class="rounded-[8px] bg-[#FDF2E9] border border-[#E8E1D5] p-3"><div class="text-[11px] uppercase tracking-wide font-semibold text-[#7C6E64]">Perlu Verifikasi</div><div class="text-[20px] font-bold">0</div></div>
<div class="rounded-[8px] bg-[#FDF2E9] border border-[#E8E1D5] p-3"><div class="text-[11px] uppercase tracking-wide font-semibold text-[#7C6E64]">Dipanggang</div><div id="adm-baking" class="text-[20px] font-bold">—</div></div>
<div class="rounded-[8px] bg-[#EAF4EC] border border-[#E8E1D5] p-3"><div class="text-[11px] uppercase tracking-wide font-semibold text-[#7C6E64]">Siap Kirim</div><div class="text-[20px] font-bold">0</div></div>
<div class="rounded-[8px] bg-white border border-[#E8E1D5] p-3"><div class="text-[11px] uppercase tracking-wide font-semibold text-[#7C6E64]">Omset Hari Ini</div><div class="text-[20px] font-bold">Rp 4.850.000</div></div>
</div>
<div class="mt-5 overflow-auto border border-[#E8E1D5] rounded-[8px]">
<table class="w-full text-[13px]">
<thead class="bg-[#F7F3EB] text-left text-[#7C6E64]"><tr><th class="px-3 py-2">Invoice</th><th class="px-3 py-2">Pembeli</th><th class="px-3 py-2">Rincian & Plakat</th><th class="px-3 py-2">Status</th><th class="px-3 py-2">Aksi</th></tr></thead>
<tbody id="adm-tbody" class="divide-y divide-[#E8E1D5]"></tbody>
</table>
</div>
</div>
</section>

<footer class="border-t border-[#E8E1D5] bg-white mt-6">
<div class="max-w-[1160px] mx-auto px-4 h-14 flex items-center justify-between text-[12px] text-[#7C6E64]">
<span>© 2026 Aroma Rasa Artisanal Patisserie · Warm artisanal, high-trust</span>
<a href="#" id="link-admin" class="font-semibold hover:text-[#2B1D14]">Admin</a>
</div>
</footer>

<!-- Cart Drawer -->
<div id="drawer" class="fixed inset-0 z-50 hidden">
<div id="drawer-backdrop" class="absolute inset-0 bg-[#2B1D14]/40 backdrop-blur-[2px]"></div>
<div class="absolute right-0 top-0 h-full w-full max-w-[420px] bg-[#FDF9F3] border-l border-[#E8E1D5] shadow-[-16px_0_32px_rgba(43,29,20,0.12)] flex flex-col">
<div class="h-[64px] px-5 flex items-center justify-between border-b border-[#E8E1D5] bg-white">
<h3 class="font-semibold">Keranjang</h3>
<button id="drawer-close" class="w-8 h-8 rounded-full border border-[#E8E1D5] bg-white grid place-items-center hover:bg-[#F7F3EB]">✕</button>
</div>
<div id="drawer-items" class="flex-1 overflow-auto p-4 space-y-3"></div>
<div class="p-4 border-t border-[#E8E1D5] bg-white space-y-3">
<div class="flex justify-between text-[13px]"><span class="text-[#7C6E64]">Subtotal</span><span id="drawer-sub" class="font-semibold">Rp 0</span></div>
<div class="flex justify-between text-[14px] font-bold"><span>Total</span><span id="drawer-total">Rp 0</span></div>
<a href="#checkout" id="drawer-checkout" class="w-full h-11 rounded-[8px] bg-[#D96B27] text-white font-semibold grid place-items-center hover:bg-[#C25B1D]">Lanjut Checkout</a>
</div>
</div>
</div>

<!-- Success Modal -->
<div id="modal" class="fixed inset-0 z-50 hidden">
<div class="absolute inset-0 bg-[#2B1D14]/50 backdrop-blur-[2px]"></div>
<div class="absolute inset-0 grid place-items-center p-4">
<div class="w-full max-w-[560px] bg-white rounded-[16px] border border-[#E8E1D5] shadow-[0_20px_40px_rgba(43,29,20,0.16)] overflow-hidden">
<div class="h-1 bg-[#335C3D]"></div>
<div class="p-6">
<div class="w-10 h-10 rounded-full bg-[#EAF4EC] border border-[#E8E1D5] grid place-items-center text-[#335C3D]">✓</div>
<h3 class="font-display font-bold text-[22px] mt-3">Pesanan Diterima & Terverifikasi</h3>
<p class="text-[13px] text-[#7C6E64] mt-1">QRIS terverifikasi otomatis. Simpan No. Invoice untuk lacak status tanpa login.</p>
<div class="mt-4 rounded-[8px] bg-[#FDF9F3] border border-[#E8E1D5] p-4">
<div class="text-[11px] tracking-[0.08em] uppercase font-semibold text-[#7C6E64]">Invoice</div>
<div id="modal-invoice" class="font-mono font-bold text-[20px] tracking-tight">#AR-XXXX</div>
<div id="modal-total" class="text-[13px] font-semibold mt-1">Total Rp —</div>
</div>
<div class="mt-4">
  <div class="text-[12px] font-semibold">Bubble WhatsApp — siap kirim ke toko</div>
  <pre id="modal-wa-text" class="font-mono text-[10px] sm:text-[11px] leading-[1.5] whitespace-pre-wrap break-words mt-2 bg-[#F7F3EB] border border-[#E8E1D5] rounded-[8px] p-3 max-h-[140px] sm:max-h-[180px] overflow-auto"></pre>
</div>
<div class="mt-5 flex flex-col sm:flex-row gap-3">
<a id="modal-wa-btn" href="#" target="_blank" class="w-full sm:flex-1 h-10 sm:h-11 rounded-[8px] bg-[#335C3D] text-white font-bold text-[13px] sm:text-[14px] inline-flex items-center justify-center gap-2 hover:bg-[#274830]">💬 Kirim via WhatsApp</a>
<button id="modal-close" class="w-full sm:w-auto h-10 sm:h-11 px-5 rounded-[8px] bg-white border border-[#E8E1D5] font-semibold text-[13px] hover:bg-[#F7F3EB]">Tutup & Lacak</button>
</div>
</div>
</div>
</div>
</div>

<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').content;
let products = [];
let cart = []; // {id, name, price, qty, image}
let fulfillment = 'delivery';

function fmt(n){ return 'Rp ' + Number(n).toLocaleString('id-ID'); }

async function loadProducts(){
  try{
    const r = await fetch('/api/products'); if(!r.ok) throw new Error('gagal load');
    products = await r.json();
    renderProducts();
  }catch(e){ document.getElementById('product-grid').innerHTML = '<div class="col-span-full text-center py-8 text-red-700 text-[13px]">Gagal memuat katalog. Refresh halaman.</div>'; }
}
async function loadOven(){
  try{
    const r = await fetch('/api/oven-status'); if(!r.ok) return;
    const o = await r.json(); if(!o) return;
    document.getElementById('oven-batch').textContent = o.batch_name;
    document.getElementById('oven-temp').textContent = Number(o.temperature).toFixed(1)+'°C';
    document.getElementById('oven-min').textContent = o.remaining_minutes+' menit';
  }catch{}
}

function renderProducts(){
  const grid = document.getElementById('product-grid');
  const activeCat = document.querySelector('.cat-tab.bg-\\[\\#2B1D14\\]')?.dataset.cat || 'all';
  let list = products;
  if(activeCat !== 'all') list = products.filter(p=> (p.category?.name||'')===activeCat);
  if(!list.length){ grid.innerHTML = '<div class="col-span-full text-center py-8 text-[#7C6E64] text-[13px]">Tidak ada produk di kategori ini.</div>'; return; }
  grid.innerHTML = list.map(p=>`
    <article class="bg-white border border-[#E8E1D5] rounded-[12px] overflow-hidden flex flex-col shadow-[0_1px_3px_rgba(43,29,20,0.05)] hover:shadow-[0_4px_14px_rgba(43,29,20,0.08)] transition-shadow">
      <div class="relative">
        <img src="${p.image_url}" alt="${p.name}" class="w-full h-[190px] object-cover" loading="lazy">
        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[11px] font-bold border ${p.badge_status==='Ready Stock' ? 'bg-[#EAF4EC] text-[#335C3D] border-[#E8E1D5]' : 'bg-[#FDF2E9] text-[#D96B27] border-[#E8E1D5]'}">${p.badge_status}</span>
      </div>
      <div class="p-4 flex-1 flex flex-col">
        <h3 class="font-semibold text-[15px] leading-tight">${p.name}</h3>
        <p class="text-[12px] leading-[1.5] text-[#7C6E64] mt-1 line-clamp-2">${p.description||''}</p>
        <div class="flex items-center justify-between mt-3">
          <span class="font-bold text-[15px]">${fmt(p.price)}</span>
          <button data-add="${p.id}" class="h-8 px-3 rounded-[8px] bg-[#2B1D14] text-white text-[13px] font-semibold hover:bg-black active:bg-[#1a110c]">+ Keranjang</button>
        </div>
      </div>
    </article>
  `).join('');
  grid.querySelectorAll('[data-add]').forEach(b=> b.addEventListener('click', ()=> addToCart(Number(b.dataset.add))));
}

function addToCart(id){
  const p = products.find(x=>x.id===id); if(!p) return;
  const ex = cart.find(c=>c.id===id);
  if(ex) ex.qty++; else cart.push({id, name:p.name, price:Number(p.price), qty:1, image:p.image_url});
  syncCart();
  openDrawer();
}
function syncCart(){
  document.getElementById('cart-count').textContent = cart.reduce((s,c)=>s+c.qty,0);
  const sub = cart.reduce((s,c)=> s + c.price*c.qty, 0);
  const fee = fulfillment==='delivery' ? 20000 : 0;
  const total = sub + (cart.length?fee:0);
  document.getElementById('sum-sub').textContent = fmt(sub);
  document.getElementById('sum-fee').textContent = cart.length? fmt(fee) : fmt(0);
  document.getElementById('sum-total').textContent = fmt(total);
  document.getElementById('drawer-sub').textContent = fmt(sub);
  document.getElementById('drawer-total').textContent = fmt(total);
  const itemsEl = document.getElementById('summary-items');
  const drawerEl = document.getElementById('drawer-items');
  if(!cart.length){
    itemsEl.innerHTML = 'Keranjang kosong — tambah produk di atas.';
    drawerEl.innerHTML = '<div class="text-center py-10 text-[13px] text-[#7C6E64]">Keranjang kosong</div>';
  } else {
    const html = cart.map(c=>`
      <div class="flex gap-3 items-center">
        <img src="${c.image}" class="w-12 h-12 rounded-[8px] object-cover border border-[#E8E1D5]">
        <div class="flex-1 min-w-0">
          <div class="text-[13px] font-medium leading-tight truncate">${c.name}</div>
          <div class="text-[12px] text-[#7C6E64]">${fmt(c.price)} × ${c.qty}</div>
        </div>
        <div class="flex items-center gap-1">
          <button data-dec="${c.id}" class="w-7 h-7 rounded-full border border-[#E8E1D5] bg-white grid place-items-center hover:bg-[#F7F3EB]">−</button>
          <span class="w-6 text-center text-[13px] font-semibold">${c.qty}</span>
          <button data-inc="${c.id}" class="w-7 h-7 rounded-full border border-[#E8E1D5] bg-white grid place-items-center hover:bg-[#F7F3EB]">+</button>
        </div>
      </div>
    `).join('');
    itemsEl.innerHTML = html + `<div class="pt-2 text-[11px] text-[#7C6E64]">Ongkir ${fmt(fee)} · Total ${fmt(total)}</div>`;
    drawerEl.innerHTML = html;
    drawerEl.querySelectorAll('[data-inc]').forEach(b=> b.addEventListener('click', ()=>{ const it=cart.find(x=>x.id==b.dataset.inc); it.qty++; syncCart(); updateWaPreview(); }));
    drawerEl.querySelectorAll('[data-dec]').forEach(b=> b.addEventListener('click', ()=>{ const it=cart.find(x=>x.id==b.dataset.dec); it.qty--; if(it.qty<=0) cart=cart.filter(x=>x.id!=it.id); syncCart(); updateWaPreview(); }));
    itemsEl.querySelectorAll('[data-inc]')?.forEach(()=>{}); // no inc in summary
  }
  updateWaPreview();
}

function updateWaPreview(){
  const name = document.getElementById('f-name').value || 'Amanda Ramadhani';
  const phone = document.getElementById('f-phone').value || '085782749611';
  const slot = document.getElementById('f-slot').value;
  const plaque = document.getElementById('f-plaque').value;
  const accs = [...document.querySelectorAll('.acc:checked')].map(x=>x.value);
  const fee = fulfillment==='delivery' ? 20000 : 0;
  const sub = cart.reduce((s,c)=>s+c.price*c.qty,0);
  const total = sub + (cart.length?fee:0);
  const addr = document.getElementById('f-address').value;
  let lines = ['✨ PESANAN BARU #AR-XXXX ✨','--------------------------------',`• Nama: ${name}`,`• WhatsApp: ${phone}`,'• Menu:'];
  if(!cart.length) lines.push('  - (keranjang kosong)');
  else cart.forEach(c=> lines.push(`  - ${c.qty}x ${c.name} (Rp ${Number(c.price*c.qty).toLocaleString('id-ID')})`));
  lines.push(`• Metode: ${fulfillment==='delivery' ? 'Kurir Termal Ice Pack (Rp '+fee.toLocaleString('id-ID')+')' : 'Ambil Sendiri'}`);
  lines.push(`• Waktu Kirim: ${slot}`);
  if(addr) lines.push(`• ${fulfillment==='delivery' ? 'Alamat' : 'Titik Ambil'}: ${addr}`);
  if(plaque) lines.push(`• Plakat Cokelat: "${plaque}"`);
  if(accs.length) lines.push(`• Perlengkapan: ${accs.join(', ')}`);
  lines.push(`• Total: Rp ${total.toLocaleString('id-ID')} (QRIS Terverifikasi)`);
  lines.push('--------------------------------','Mohon konfirmasi jadwal oven dan pengiriman dapur Aroma Rasa. Terima kasih!');
  document.getElementById('wa-preview').textContent = lines.join('\n');
}

// events
document.querySelectorAll('.cat-tab').forEach(b=> b.addEventListener('click', ()=>{
  document.querySelectorAll('.cat-tab').forEach(x=>{ x.className='cat-tab h-8 px-4 rounded-full bg-white border border-[#E8E1D5] hover:bg-[#F7F3EB]'; });
  b.className='cat-tab h-8 px-4 rounded-full bg-[#2B1D14] text-white font-semibold';
  renderProducts();
}));
document.querySelectorAll('input[name="fulfillment"]').forEach(r=> r.addEventListener('change', ()=>{
  fulfillment = document.querySelector('input[name="fulfillment"]:checked').value;
  const isDelivery = fulfillment==='delivery';
  document.getElementById('label-address').textContent = isDelivery ? 'Alamat pengiriman *' : 'Titik ambil / alamat lengkap';
  document.getElementById('f-address').placeholder = isDelivery ? 'Jl. Gandaria Tengah IV No. 18A, Jaksel' : 'Ambil di Toko Aroma Rasa, Jl. Gandaria ... (atau isi alamat jika perlu)';
  document.getElementById('hint-address').textContent = isDelivery ? 'Alamat lengkap untuk kurir' : 'Wajib isi: alamat pengambilan cabang / alamat Anda';
  syncCart();
}));
document.getElementById('f-name').addEventListener('input', updateWaPreview);
document.getElementById('f-phone').addEventListener('input', updateWaPreview);
document.getElementById('f-slot').addEventListener('change', updateWaPreview);
document.getElementById('f-plaque').addEventListener('input', e=>{ document.getElementById('plaque-count').textContent = e.target.value.length; updateWaPreview(); });
document.querySelectorAll('.acc').forEach(c=> c.addEventListener('change', updateWaPreview));
document.getElementById('f-address').addEventListener('input', updateWaPreview);

function openDrawer(){ document.getElementById('drawer').classList.remove('hidden'); }
function closeDrawer(){ document.getElementById('drawer').classList.add('hidden'); }
document.getElementById('btn-cart').addEventListener('click', openDrawer);
document.getElementById('drawer-close').addEventListener('click', closeDrawer);
document.getElementById('drawer-backdrop').addEventListener('click', closeDrawer);
document.getElementById('drawer-checkout').addEventListener('click', (e)=>{ e.preventDefault(); closeDrawer(); document.getElementById('checkout').scrollIntoView({behavior:'smooth'}); });

document.getElementById('btn-tracker').addEventListener('click', ()=> document.getElementById('lacak').scrollIntoView({behavior:'smooth'}));
document.getElementById('link-admin').addEventListener('click', (e)=>{ e.preventDefault(); document.getElementById('admin').classList.toggle('hidden'); if(!document.getElementById('admin').classList.contains('hidden')) loadAdmin(); });

// checkout submit
document.getElementById('checkout-form').addEventListener('submit', async (e)=>{
  e.preventDefault();
  const errEl = document.getElementById('form-error'); errEl.classList.add('hidden'); errEl.textContent='';
  if(!cart.length){ errEl.textContent='Keranjang kosong — tambah minimal 1 produk.'; errEl.classList.remove('hidden'); return; }
  const name = document.getElementById('f-name').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  const email = document.getElementById('f-email').value.trim();
  const slot = document.getElementById('f-slot').value;
  const plaque = document.getElementById('f-plaque').value.trim();
  const address = document.getElementById('f-address').value.trim();
  const accs = [...document.querySelectorAll('.acc:checked')].map(x=>x.value);
  if(name.length<3){ errEl.textContent='Nama minimal 3 karakter.'; errEl.classList.remove('hidden'); return; }
  if(!/^\d{10,13}$/.test(phone)){ errEl.textContent='Nomor WhatsApp harus 10–13 digit angka.'; errEl.classList.remove('hidden'); return; }
  if(fulfillment==='delivery' && !address){ errEl.textContent='Alamat wajib untuk pengiriman.'; errEl.classList.remove('hidden'); return; }
  const btn = document.getElementById('btn-submit'); const label=document.getElementById('btn-submit-label'); const spin=document.getElementById('btn-submit-spinner');
  btn.disabled=true; label.textContent='Memproses…'; spin.classList.remove('hidden');
  try{
    const r = await fetch('/api/orders', {
      method:'POST',
      headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF, 'Accept':'application/json'},
      body: JSON.stringify({
        customer_name:name, customer_phone:phone, customer_email:email||null,
        fulfillment_method:fulfillment, delivery_slot:slot, delivery_address:address||null,
        chocolate_plaque: plaque||null, cutlery_accessories: accs,
        items: cart.map(c=> ({product_id:c.id, quantity:c.qty}))
      })
    });
    const data = await r.json();
    if(!r.ok) throw new Error(data.message || JSON.stringify(data.errors||data));
    showModal(data.invoice, data.total, data.whatsapp_url);
    cart=[]; syncCart();
  }catch(ex){
    errEl.textContent = ex.message.includes('422') ? 'Validasi gagal — periksa field.' : ex.message.slice(0,300);
    errEl.classList.remove('hidden');
  }finally{
    btn.disabled=false; label.textContent='Checkout via WhatsApp — Bayar QRIS'; spin.classList.add('hidden');
  }
});

function showModal(invoice, total, waUrl){
  document.getElementById('modal-invoice').textContent = '#'+invoice;
  document.getElementById('modal-total').textContent = 'Total '+fmt(total)+' (QRIS Terverifikasi)';
  document.getElementById('modal-wa-text').textContent = document.getElementById('wa-preview').textContent.replace('AR-XXXX', invoice);
  document.getElementById('modal-wa-btn').href = waUrl;
  document.getElementById('modal').classList.remove('hidden');
}
document.getElementById('modal-close').addEventListener('click', ()=>{
  document.getElementById('modal').classList.add('hidden');
  document.getElementById('lacak').scrollIntoView({behavior:'smooth'});
  document.getElementById('track-invoice').value = document.getElementById('modal-invoice').textContent.replace('#','');
  doTrack();
});
document.getElementById('modal').addEventListener('click', (e)=>{ if(e.target.id==='modal') e.currentTarget.classList.add('hidden'); });

// tracker
async function doTrack(){
  const inv = document.getElementById('track-invoice').value.trim();
  const err = document.getElementById('track-error'); err.classList.add('hidden');
  if(!inv){ err.textContent='Masukkan No. Invoice.'; err.classList.remove('hidden'); return; }
  const btn=document.getElementById('btn-track'); btn.disabled=true; btn.textContent='Memuat…';
  try{
    const r = await fetch('/api/orders/'+encodeURIComponent(inv), {headers:{Accept:'application/json'}});
    if(!r.ok) throw new Error('Invoice tidak ditemukan');
    const d = await r.json();
    document.getElementById('track-result').classList.remove('hidden');
    document.getElementById('tr-invoice').textContent = '#'+d.invoice;
    document.getElementById('tr-badge').textContent = d.status;
    document.getElementById('tr-temp').textContent = Number(d.temperature).toFixed(1)+'°C';
    document.getElementById('tr-min').textContent = d.remaining_minutes+' menit';
    document.getElementById('tr-wa').href = d.whatsapp_url;
  }catch(ex){ err.textContent=ex.message; err.classList.remove('hidden'); document.getElementById('track-result').classList.add('hidden'); }
  finally{ btn.disabled=false; btn.textContent='Lacak Status'; }
}
document.getElementById('btn-track').addEventListener('click', doTrack);
document.getElementById('track-invoice').addEventListener('keydown', e=>{ if(e.key==='Enter'){ e.preventDefault(); doTrack(); }});

// admin
async function loadAdmin(){
  try{
    const r = await fetch('/api/products'); // placeholder, real admin needs own endpoint
    document.getElementById('adm-total').textContent = '1';
    document.getElementById('adm-baking').textContent = '1';
    document.getElementById('adm-tbody').innerHTML = `<tr><td class="px-3 py-2 font-mono font-semibold">AR-8821</td><td class="px-3 py-2">Amanda Ramadhani<br><span class="text-[#7C6E64] text-[11px]">081289217731</span></td><td class="px-3 py-2">Basque Cheesecake + Croissant Box<br><span class="text-[#7C6E64] text-[11px]">Plakat: Happy 25th Birthday Amanda ✨</span></td><td class="px-3 py-2"><span class="px-2 py-1 rounded-full bg-[#FDF2E9] border border-[#E8E1D5] text-[11px] font-bold">Baking</span></td><td class="px-3 py-2"><a href="https://wa.me/6281289217731" target="_blank" class="h-7 px-3 rounded-full bg-[#335C3D] text-white text-[11px] font-semibold inline-flex items-center gap-1">WA</a></td></tr>`;
  }catch{}
}

loadProducts(); loadOven(); syncCart(); updateWaPreview();
</script>
</body>
</html>
