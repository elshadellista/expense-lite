<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Glow Up 🐾</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Quicksand', sans-serif; }
        .sidebar-gradient { background: #AEB719; } /* Olive dari Palette */
        .bg-antique { background-color: #F7EBDF; } /* Antique White dari Palette */
        .text-raspberry { color: #9E0232; } /* Pink Raspberry dari Palette */
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border-radius: 30px; border: 1px solid rgba(255, 255, 255, 0.5); }
        button {
        cursor: pointer !important; /* Biar pas disentuh kursor berubah jadi tangan */
        -webkit-appearance: none;
        }
        .bg-raspberry {
        background-color: #9E0232 !important;
        }
    </style>
</head>
<body class="bg-antique text-gray-800">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-72 sidebar-gradient text-white flex flex-col p-8 shadow-2xl z-10">
            <div class="flex items-center gap-3 mb-12">
                <div class="bg-white p-2 rounded-2xl shadow-inner">🐱</div>
                <h1 class="text-xl font-bold tracking-tighter italic">Glow Up 🐾</h1>
            </div>

            <nav class="flex flex-col gap-3 flex-grow">
                <p class="text-[10px] uppercase tracking-widest font-bold opacity-60 mb-2">Utama</p>
                <a href="#" class="bg-white/20 p-4 rounded-2xl flex items-center gap-4 shadow-sm border border-white/10 group">
                    <span>🏠</span> <span class="font-bold">Dashboard</span>
                </a>
                <a href="/admin/expenses" class="p-4 rounded-2xl flex items-center gap-4 hover:bg-white/10 transition-all">
                    <span>📊</span> <span>History Jajan</span>
                </a>
                <a href="/admin/categories" class="p-4 rounded-2xl flex items-center gap-4 hover:bg-white/10 transition-all">
                    <span>🌸</span> <span>Kategori</span>
                </a>

                <p class="text-[10px] uppercase tracking-widest font-bold opacity-60 mt-8 mb-2">Tujuan</p>
                <a href="/admin/goals" class="p-4 rounded-2xl flex items-center gap-4 hover:bg-white/10 transition-all">
                    <span>✨</span> <span>Wishlist Impian</span>
                </a>
                <a href="/admin" class="p-4 rounded-2xl flex items-center gap-4 hover:bg-white/10 transition-all">
                    <span>⚙️</span> <span>Setelan Admin</span>
                </a>
            </nav>

            <div class="mt-auto p-4 bg-black/10 rounded-3xl border border-white/5">
                <p class="text-[10px] font-bold opacity-50">VERSI 1.0</p>
                <p class="text-xs italic">Stay Glowing, Aiseukriem! ✨</p>
            </div>
        </aside>


        <main class="flex-1 overflow-y-auto p-10 lg:p-14">

            <header class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-raspberry">Halo, Aiseukriem! 🍓</h2>
                    <p class="text-gray-400 font-medium mt-1">Cek pengeluaranmu hari ini, yuk.</p>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="bg-white px-6 py-3 rounded-full shadow-sm flex items-center gap-3 border border-pink-100">
                        <span class="text-xs font-bold text-raspberry">📅 {{ date('d M Y') }}</span>
                    </div>
                </div>
            </header>


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-12">

                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-[#F8CAE4] p-8 rounded-[40px] shadow-sm flex flex-col justify-between border-b-8 border-pink-300">
                        <p class="text-xs font-bold text-raspberry uppercase tracking-widest">Sisa Jatah Jajan</p>
                        <h3 class="text-4xl font-bold mt-4">Rp {{ number_format($sisa, 0, ',', '.') }}</h3>
                        <p class="text-[10px] mt-4 font-bold italic opacity-70">
                        "{{ $status ?? 'Stay glowing, stay saving! ✨' }}"</p>
                    </div>


                    <div class="bg-[#CFDD9D] p-8 rounded-[40px] shadow-sm flex flex-col justify-between border-b-8 border-green-300">
                        <p class="text-xs font-bold text-[#4a5d58] uppercase tracking-widest">Tabungan Goals</p>
                        <h3 class="text-4xl font-bold mt-4">Rp 1.200.000</h3>
                        <p class="text-[10px] mt-4 font-bold opacity-50 italic">3 dari 5 impian tercapai! 💫</p>
                    </div>
                </div>


                <div class="glass-card p-8 flex flex-col items-center justify-center text-center shadow-lg">
                    <div class="relative w-32 h-32 mb-4">
                        <svg class="w-full h-full transform -rotate-90">
                            <circle cx="64" cy="64" r="50" stroke="#F8CAE4" stroke-width="12" fill="transparent" />
                            <circle cx="64" cy="64" r="50" stroke="#AEB719" stroke-width="12" fill="transparent"
                                    stroke-dasharray="314.15" stroke-dashoffset="100" />
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-2xl font-bold">75%</span>
                            <span class="text-[8px] font-bold text-gray-400">AMAN</span>
                        </div>
                    </div>
                    <p class="text-xs font-bold text-gray-400 uppercase">Efisiensi Bulan Ini</p>
                </div>
            </div>


            <div class="glass-card p-10 shadow-sm border border-white/80">
                <div class="flex justify-between items-center mb-10">
                    <h3 class="text-2xl font-bold text-[#4a5d58]">Riwayat Jajan Terakhir 🐾</h3>
                        <button onclick="toggleModal()" class="bg-[#9E0232] text-white px-8 py-3 rounded-2xl font-bold text-sm shadow-lg shadow-pink-200 hover:bg-[#7a0226] transition-all cursor-pointer border-none flex items-center gap-2 min-w-[160px] justify-center">
                        <span class="text-lg">🐾</span>
                        <span class="text-white">Tambah Jajan</span>
                        </button>
                </div>

                <div class="overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] uppercase text-gray-400 border-b border-gray-100">
                                <th class="pb-6 font-bold tracking-widest">Kategori</th>
                                <th class="pb-6 font-bold tracking-widest">Tanggal</th>
                                <th class="pb-6 font-bold tracking-widest">Nominal</th>
                                <th class="pb-6 font-bold tracking-widest text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($recentExpenses as $item)
                            <tr class="border-b border-gray-50/50 hover:bg-white/40 transition-all group">
                                <td class="py-6 flex items-center gap-4">
                                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-lg">{{ $item->category->icon ?? '🐾' }}</div>
                                    <span class="font-bold text-gray-700">{{ $item->category->name }}</span>
                                </td>
                                <td class="py-6 text-gray-400 font-medium">{{ $item->date }}</td>
                                <td class="py-6 font-bold text-raspberry">- Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                                <td class="py-6 text-right">
                                    <button class="w-8 h-8 rounded-lg hover:bg-raspberry hover:text-white transition-all">✏️</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-20 text-center text-gray-400 italic">Belum ada jajan yang dicatat hari ini... 🍓</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <div id="modalJajan" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white w-full max-w-md p-8 rounded-[40px] shadow-2xl border-4 border-[#F8CAE4]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-[#9E0232]">Catat Jajan Baru 🐾</h2>
            <button onclick="toggleModal()" class="text-gray-400 hover:text-black text-2xl">✕</button>
        </div>

        <form action="/add-expense" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-400 mb-2 uppercase">Pilih Kategori</label>
                <select name="category_id" class="w-full p-4 rounded-2xl border-none bg-[#F7EBDF] font-semibold text-gray-700 focus:ring-2 focus:ring-[#F8CAE4]">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-2 uppercase">Nominal Jajan</label>
                <input type="number" name="amount" placeholder="Contoh: 15000" required class="w-full p-4 rounded-2xl border-none bg-[#F7EBDF] font-bold focus:ring-2 focus:ring-[#F8CAE4]">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-2 uppercase">Catatan Kecil</label>
                <input type="text" name="description" placeholder="Beli apa hari ini?" class="w-full p-4 rounded-2xl border-none bg-[#F7EBDF] focus:ring-2 focus:ring-[#F8CAE4]">
            </div>

            <button type="submit" class="w-full bg-[#9E0232] text-white p-5 rounded-[25px] font-bold shadow-xl shadow-pink-100 hover:scale-[1.02] transition-transform">
                Simpan Jajan ✨
            </button>
        </form>
    </div>
</div>

<script>
    function toggleModal() {
        const modal = document.getElementById('modalJajan');
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>

</body>
</html>
