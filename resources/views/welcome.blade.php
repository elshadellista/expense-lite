<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Glow Up ✨</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 183, 178, 0.2);
        }
    </style>
</head>
<body class="bg-[#fdf6f6] text-gray-800">
    <div class="max-w-md mx-auto min-h-screen flex flex-col p-6">

        <header class="flex justify-between items-center py-6">
     <div>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Selamat {{ $greeting }}, Aiseukriem! ✨</p>
        <p class="text-[10px] text-pink-300 font-medium">{{ $tanggal }}</p>
    </div>
        <a href="/admin" class="text-xs font-semibold bg-white px-4 py-2 rounded-full shadow-sm border border-pink-100">
        Admin
         </a>
        </header>

        <main class="flex-grow flex flex-col space-y-6 pt-4">
    <div class="text-center space-y-2 pb-4">
        <h2 class="text-3xl font-extrabold tracking-tight">Financial <span class="text-[#ffb7b2]">Glow Up</span></h2>
        <p class="text-gray-400 text-xs italic">"Stay glowing, stay saving!"</p>
    </div>

    <div class="glass-card p-6 rounded-3xl shadow-sm relative overflow-hidden">
        <div class="absolute -top-4 -right-4 w-20 h-20 bg-pink-100 rounded-full opacity-50"></div>

        <div class="relative z-10">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Sisa Jatah Jajan</p>
                    <h3 class="text-2xl font-extrabold text-gray-800">Rp {{ number_format($sisa, 0, ',', '.') }}</h3>
                </div>
                <span class="bg-yellow-100 text-yellow-600 text-[10px] px-2 py-1 rounded-md font-bold uppercase tracking-tighter">
                    {{ $sisa > 0 ? 'Hemat Ya!' : 'Boncos!' }}
                </span>
            </div>

            <div class="space-y-2">
                <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                    @php $persen = $budget > 0 ? ($total / $budget) * 100 : 0; @endphp
                    <div class="bg-[#ffb7b2] h-full rounded-full transition-all duration-700" style="width: {{ min($persen, 100) }}%"></div>
                </div>
                <div class="flex justify-between text-[10px] text-gray-400 font-medium italic">
                    <span>Terpakai: Rp {{ number_format($total, 0, ',', '.') }}</span>
                    <span>Goal: Rp {{ number_format($budget, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>

    <a href="/admin/expenses/create" class="block w-full bg-[#ffb7b2] text-white font-bold py-4 rounded-2xl shadow-lg shadow-pink-100 text-center hover:scale-[1.02] active:scale-[0.98] transition-all">
        + Catat Pengeluaran Baru
    </a>

    <div class="space-y-4 pt-2">
        <div class="flex justify-between items-center px-2">
            <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">Jajan Terakhir</h3>
            <a href="/admin/expenses" class="text-[10px] font-bold text-[#ffb7b2]">LIHAT SEMUA</a>
        </div>

        <div class="space-y-3">
            @forelse($recentExpenses as $item)
                <div class="bg-white p-4 rounded-2xl border border-pink-50 shadow-sm flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-pink-50 rounded-xl flex items-center justify-center text-lg">
                            {{ $item->category->icon ?? '💸' }}
                        </div>
                        <div>
                            <p class="font-bold text-sm text-gray-800">{{ $item->name ?? 'Jajan' }}</p>
                            <p class="text-[10px] text-gray-400 italic">
                                {{ $item->category->name ?? 'Tanpa Kategori' }} • {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                    <p class="font-extrabold text-sm text-red-400">-Rp{{ number_format($item->amount, 0, ',', '.') }}</p>
                </div>
            @empty
                <div class="text-center py-6">
                    <p class="text-xs text-gray-400 italic">Belum ada jajan, dompet aman! ✨</p>
                </div>
            @endforelse
        </div>
    </div>
</main>

        <footer class="py-8 text-center">
            <div class="inline-flex items-center gap-2 bg-pink-50 px-4 py-2 rounded-full">
                <span class="text-sm">
                    @if($sisa > 0)
                        Status: <span class="font-bold text-pink-500 italic">"Masih bisa jajan kopi, Bestie! ☕"</span>
                    @else
                        Status: <span class="font-bold text-red-500 italic">"Mode hemat aktif, stop jajan dulu! 🛑"</span>
                    @endif
                </span>
            </div>
        </footer>
    </div>
</body>
</html>
