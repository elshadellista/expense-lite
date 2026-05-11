<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>MeowBudget - Cat Budget App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --pink: #f75ca2;
            --pink-dark: #d93b7e;
            --pink-soft: #ffe4f0;
            --pink-light: #fff3f8;
            --white: #ffffff;
            --text: #34303a;
            --muted: #9b8b96;
            --red: #ef4b5f;
            --green: #32b768;
            --shadow: 0 14px 35px rgba(219, 62, 126, 0.16);
            --radius: 28px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            color: var(--text);
            background:
                radial-gradient(circle at top left, #ffd5e7 0, transparent 34%),
                radial-gradient(circle at bottom right, #ffe5f2 0, transparent 32%),
                #fff8fb;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        .app {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: linear-gradient(180deg, #f85ca3, #e94d93);
            color: white;
            padding: 28px 22px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 900;
            margin-bottom: 34px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: rgba(255,255,255,.22);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.24);
        }

        .side-menu {
            display: grid;
            gap: 12px;
        }

        .side-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 18px;
            background: rgba(255,255,255,.13);
            color: white;
            font-weight: 700;
        }

        .side-item.active {
            background: white;
            color: var(--pink-dark);
        }

        .content {
            padding: 28px;
            max-width: 1250px;
            width: 100%;
            margin: 0 auto;
        }

        .mobile-top {
            display: none;
        }

        .desktop-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .desktop-title h1 {
            font-size: 34px;
            color: var(--pink-dark);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            border-radius: 999px;
            padding: 12px 18px;
            background: white;
            box-shadow: var(--shadow);
            color: var(--pink-dark);
            font-weight: 800;
        }

        .top-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-bottom: 22px;
        }

        .card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid #ffe1ee;
        }

        .budget-card {
            padding: 28px;
        }

        .card-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .card-head h2 {
            font-size: 22px;
        }

        .card-head p {
            color: var(--muted);
            margin-top: 5px;
            line-height: 1.5;
        }

        .cat-badge {
            width: 68px;
            height: 68px;
            display: grid;
            place-items: center;
            border-radius: 24px;
            background: var(--pink-soft);
            font-size: 34px;
        }

        .date-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            color: var(--pink);
            font-size: 28px;
            margin: 12px 0 22px;
        }

        .date-row strong {
            color: var(--text);
            font-size: 20px;
            font-weight: 600;
        }

        .donut-wrap {
            display: grid;
            place-items: center;
            margin: 8px 0 18px;
        }

        .donut {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background:
                conic-gradient(var(--pink) {{ $usedPercent }}%, #ffddeb 0);
            position: relative;
        }

        .donut::after {
            content: "";
            position: absolute;
            width: 86px;
            height: 86px;
            background: white;
            border-radius: 50%;
        }

        .donut span {
            position: relative;
            z-index: 2;
            font-size: 20px;
            font-weight: 900;
        }

        .budget-total {
            text-align: center;
            color: var(--pink);
            font-size: 28px;
            font-weight: 900;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-top: 20px;
        }

        .summary-box {
            background: var(--pink-light);
            padding: 16px;
            border-radius: 20px;
            text-align: center;
        }

        .summary-box strong {
            display: block;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .summary-box span {
            color: var(--muted);
            font-size: 14px;
        }

        .green {
            color: var(--green);
        }

        .red {
            color: var(--red);
        }

        .pink {
            color: var(--pink);
        }

        .calendar-card {
            padding: 24px;
        }

        .calendar-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .calendar-head h2 {
            font-size: 22px;
        }

        .calendar-mode {
            background: var(--pink);
            color: white;
            border-radius: 999px;
            padding: 10px 18px;
            font-weight: 800;
        }

        .weekdays,
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            text-align: center;
        }

        .weekdays {
            margin-bottom: 8px;
            color: var(--pink-dark);
            font-weight: 800;
        }

        .day {
            min-height: 58px;
            border-radius: 16px;
            padding: 6px;
            background: #fff8fb;
            position: relative;
        }

        .day.today {
            background: #ffd9e9;
            color: var(--pink-dark);
            font-weight: 900;
        }

        .day-number {
            display: block;
            margin-bottom: 4px;
        }

        .money-tag {
            display: inline-block;
            font-size: 11px;
            padding: 2px 4px;
            border-radius: 5px;
            color: white;
            margin-top: 2px;
        }

        .money-tag.expense {
            background: var(--red);
        }

        .money-tag.income {
            background: var(--green);
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 22px;
        }

        .category-card,
        .form-card,
        .transaction-card {
            padding: 24px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .section-title h2 {
            font-size: 22px;
        }

        .section-title span {
            color: var(--pink);
            font-weight: 900;
        }

        .category-list {
            display: grid;
            gap: 14px;
        }

        .category-item {
            display: grid;
            grid-template-columns: 56px 145px 1fr 70px;
            align-items: center;
            gap: 12px;
        }

        .cat-icon {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: var(--pink-soft);
            font-size: 28px;
        }

        .cat-name strong {
            display: block;
            font-size: 17px;
            margin-bottom: 3px;
        }

        .cat-name small {
            color: var(--muted);
        }

        .progress-area {
            position: relative;
        }

        .progress-meta {
            display: flex;
            justify-content: space-between;
            color: var(--pink);
            font-size: 13px;
            margin-bottom: 5px;
        }

        .progress {
            height: 28px;
            background: #f7fbff;
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #ffd3e6, #ffc1dc);
            border-radius: 999px;
        }

        .arrow {
            color: var(--pink);
            font-size: 22px;
            font-weight: 900;
            text-align: right;
        }

        .form-card {
            margin-bottom: 22px;
        }

        .form-grid {
            display: grid;
            gap: 14px;
        }

        .field label {
            display: block;
            color: var(--muted);
            font-weight: 800;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .input,
        .select {
            width: 100%;
            border: 1px solid #ffd6e8;
            background: #fff8fb;
            padding: 13px 14px;
            border-radius: 16px;
            outline: none;
            font-size: 15px;
            color: var(--text);
        }

        .two {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 18px;
            padding: 14px 18px;
            background: var(--pink);
            color: white;
            font-weight: 900;
            cursor: pointer;
            box-shadow: 0 10px 22px rgba(247, 92, 162, .28);
        }

        .btn-light {
            background: white;
            color: var(--pink-dark);
            border: 1px solid #ffd6e8;
            box-shadow: none;
        }

        .btn-danger {
            background: #ff6c81;
            padding: 8px 12px;
            border-radius: 12px;
            font-size: 12px;
        }

        .transaction-list {
            display: grid;
            gap: 12px;
            max-height: 490px;
            overflow: auto;
            padding-right: 4px;
        }

        .transaction {
            display: grid;
            grid-template-columns: 52px 1fr auto;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 18px;
            background: #fff8fb;
        }

        .transaction h3 {
            font-size: 16px;
            margin-bottom: 4px;
        }

        .transaction p {
            color: var(--muted);
            font-size: 13px;
        }

        .transaction-right {
            text-align: right;
        }

        .transaction-amount {
            font-weight: 900;
            font-size: 17px;
            margin-bottom: 5px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 18px;
            margin-bottom: 18px;
            font-weight: 800;
        }

        .alert-success {
            background: #e9fff2;
            color: var(--green);
            border: 1px solid #c9f4da;
        }

        .alert-error {
            background: #fff0f2;
            color: var(--red);
            border: 1px solid #ffd1d8;
        }

        .mobile-bottom {
            display: none;
        }

        .fab {
            display: none;
        }

        @media (max-width: 1000px) {
            .app {
                display: block;
            }

            .sidebar {
                display: none;
            }

            .content {
                padding: 0 0 90px;
            }

            .desktop-title {
                display: none;
            }

            .mobile-top {
                display: block;
                background: linear-gradient(180deg, #d7427d, #f75ca2);
                color: white;
                padding: 22px 18px 38px;
                border-bottom-left-radius: 28px;
                border-bottom-right-radius: 28px;
            }

            .mobile-bar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .mobile-bar h1 {
                font-size: 23px;
            }

            .book-row {
                display: flex;
                gap: 18px;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .book-item {
                min-width: 82px;
                text-align: center;
                color: white;
                font-weight: 700;
            }

            .book-icon {
                width: 58px;
                height: 58px;
                display: grid;
                place-items: center;
                margin: 0 auto 8px;
                background: rgba(255,255,255,.22);
                border-radius: 20px;
                font-size: 30px;
            }

            .top-grid,
            .main-grid {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 0 12px;
            }

            .budget-card {
                margin-top: -24px;
            }

            .card {
                border-radius: 30px;
            }

            .summary-grid {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .category-item {
                grid-template-columns: 54px 120px 1fr 22px;
                gap: 10px;
            }

            .cat-name strong {
                font-size: 16px;
            }

            .transaction-list {
                max-height: none;
            }

            .mobile-bottom {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                background: white;
                border-top: 1px solid #ffe0ec;
                box-shadow: 0 -10px 30px rgba(219, 62, 126, .12);
                z-index: 20;
            }

            .bottom-item {
                text-align: center;
                padding: 10px 4px 12px;
                color: var(--muted);
                font-size: 13px;
                font-weight: 700;
            }

            .bottom-item span {
                display: block;
                font-size: 25px;
                margin-bottom: 3px;
            }

            .bottom-item.active {
                color: var(--pink);
            }

            .fab {
                display: grid;
                place-items: center;
                position: fixed;
                right: 20px;
                bottom: 92px;
                width: 62px;
                height: 62px;
                border-radius: 22px;
                background: white;
                color: var(--pink);
                box-shadow: var(--shadow);
                font-size: 30px;
                z-index: 21;
                text-decoration: none;
            }
        }

        @media (max-width: 560px) {
            .calendar-card,
            .budget-card,
            .category-card,
            .form-card,
            .transaction-card {
                padding: 18px;
            }

            .day {
                min-height: 50px;
                font-size: 14px;
            }

            .money-tag {
                font-size: 10px;
            }

            .budget-total {
                font-size: 24px;
            }

            .summary-box {
                padding: 12px 8px;
            }

            .summary-box strong {
                font-size: 16px;
            }

            .summary-box span {
                font-size: 12px;
            }

            .two {
                grid-template-columns: 1fr;
            }

            .category-item {
                grid-template-columns: 48px 105px 1fr 18px;
            }

            .cat-icon {
                width: 46px;
                height: 46px;
                border-radius: 15px;
                font-size: 24px;
            }

            .progress {
                height: 24px;
            }

            .progress-meta {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<div class="app">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">🐱</div>
            <div>MeowBudget</div>
        </div>

        <div class="side-menu">
            <div class="side-item active">📖 Buku</div>
            <div class="side-item">👛 Dompet</div>
            <div class="side-item">🍩 Analisis</div>
            <div class="side-item">⚙️ Lebih</div>
        </div>

        <form method="POST" action="/reset" style="margin-top: 28px;">
            @csrf
            <button class="btn btn-light" type="submit" style="width:100%;">
                Reset Demo
            </button>
        </form>
    </aside>

    <main class="content">

        <div class="mobile-top">
            <div class="mobile-bar">
                <div style="font-size: 30px;">←</div>
                <h1>🐱 Buku Kucing</h1>
                <div style="font-size: 28px;">⋮</div>
            </div>

            <div class="book-row">
                <div class="book-item">
                    <div class="book-icon">🏖️</div>
                    travel
                </div>
                <div class="book-item">
                    <div class="book-icon">📖</div>
                    buku
                </div>
                <div class="book-item">
                    <div class="book-icon">➕</div>
                    baru
                </div>
                <div class="book-item">
                    <div class="book-icon">🐾</div>
                    meow
                </div>
            </div>
        </div>

        <div class="desktop-title">
            <div>
                <h1>🐱 MeowBudget</h1>
                <p style="color: var(--muted); margin-top: 5px;">
                    Budget bulanan lucu dengan tema kucing.
                </p>
            </div>

            <div class="pill">
                📅 Kalender
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <section class="top-grid">

            <div class="card budget-card">
                <div class="card-head">
                    <div>
                        <h2>Monthly <span style="color: var(--muted); font-size: 16px;">Bulanan</span></h2>
                        <p>Periode Total: {{ now()->startOfMonth()->format('d/m/Y') }} - {{ now()->endOfMonth()->format('d/m/Y') }}</p>
                    </div>

                    <div class="cat-badge">🐈</div>
                </div>

                <div class="date-row">
                    <span>‹</span>
                    <strong>{{ now()->startOfMonth()->format('d/m/Y') }} - {{ now()->endOfMonth()->format('d/m/Y') }}</strong>
                    <span>›</span>
                </div>

                <div class="donut-wrap">
                    <div class="donut">
                        <span>{{ number_format($usedPercent, 0) }}%</span>
                    </div>
                </div>

                <div class="budget-total">
                    {{ number_format($totalExpense, 2) }} / {{ number_format($monthlyBudget, 0) }}
                </div>

                <div class="summary-grid">
                    <div class="summary-box">
                        <strong class="red">-${{ number_format($totalExpense, 2) }}</strong>
                        <span>Total</span>
                    </div>

                    <div class="summary-box">
                        <strong class="green">${{ number_format($totalIncome, 2) }}</strong>
                        <span>Penghasilan</span>
                    </div>

                    <div class="summary-box">
                        <strong class="pink">${{ number_format($monthlyBudget, 2) }}</strong>
                        <span>Anggaran</span>
                    </div>
                </div>
            </div>

            <div class="card calendar-card">
                <div class="calendar-head">
                    <span style="color: var(--pink); font-size: 28px;">‹</span>
                    <h2>{{ $monthName }}</h2>
                    <div class="calendar-mode">Month</div>
                    <span style="color: var(--pink); font-size: 28px;">›</span>
                </div>

                <div class="weekdays">
                    <div>Min</div>
                    <div>Sen</div>
                    <div>Sel</div>
                    <div>Rab</div>
                    <div>Kam</div>
                    <div>Jum</div>
                    <div>Sab</div>
                </div>

                <div class="calendar-grid">
                    @for($i = 0; $i < $firstDayOfWeek; $i++)
                        <div></div>
                    @endfor

                    @for($day = 1; $day <= $daysInMonth; $day++)
                        <div class="day {{ now()->day == $day ? 'today' : '' }}">
                            <span class="day-number">{{ $day }}</span>

                            @if($calendarTotals[$day]['income'] > 0)
                                <span class="money-tag income">
                                    {{ number_format($calendarTotals[$day]['income'], 0) }}
                                </span>
                            @endif

                            @if($calendarTotals[$day]['expense'] > 0)
                                <span class="money-tag expense">
                                    -{{ number_format($calendarTotals[$day]['expense'], 0) }}
                                </span>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>

        </section>

        <section class="main-grid">

            <div class="card category-card">
                <div class="section-title">
                    <h2>🐾 Kategori Cat Budget</h2>
                    <span>{{ count($categories) }}</span>
                </div>

                <div class="category-list">
                    @foreach($categories as $category)
                        @php
                            $spent = $categorySpent[$category['key']] ?? 0;
                            $budget = $category['budget'];
                            $left = max(0, $budget - $spent);
                            $percent = $budget > 0 ? min(100, ($spent / $budget) * 100) : 0;
                        @endphp

                        <div class="category-item">
                            <div class="cat-icon">{{ $category['icon'] }}</div>

                            <div class="cat-name">
                                <strong>{{ $category['name'] }}</strong>
                                <small>{{ number_format($budget, 0) }}</small>
                            </div>

                            <div class="progress-area">
                                <div class="progress-meta">
                                    <span>${{ number_format($spent, 2) }}</span>
                                    <span>{{ number_format($percent, 0) }}%</span>
                                    <span>${{ number_format($left, 2) }}</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                                </div>
                            </div>

                            <div class="arrow">›</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="card form-card" id="add">
                    <div class="section-title">
                        <h2>➕ Tambah Transaksi</h2>
                        <span>Meow</span>
                    </div>

                    <form method="POST" action="/transaction" class="form-grid">
                        @csrf

                        <div class="field">
                            <label>Nama transaksi</label>
                            <input class="input" type="text" name="title" placeholder="Contoh: Makanan kucing" required>
                        </div>

                        <div class="two">
                            <div class="field">
                                <label>Tipe</label>
                                <select class="select" name="type" required>
                                    <option value="expense">Pengeluaran</option>
                                    <option value="income">Penghasilan</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Jumlah</label>
                                <input class="input" type="number" step="0.01" name="amount" placeholder="100" required>
                            </div>
                        </div>

                        <div class="two">
                            <div class="field">
                                <label>Kategori</label>
                                <select class="select" name="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category['key'] }}">
                                            {{ $category['icon'] }} {{ $category['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="field">
                                <label>Tanggal</label>
                                <input class="input" type="date" name="date" value="{{ now()->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <button class="btn" type="submit">
                            Simpan Transaksi 🐱
                        </button>
                    </form>
                </div>

                <div class="card transaction-card">
                    <div class="section-title">
                        <h2>📌 Transaksi</h2>
                        <span>${{ number_format($totalExpense, 2) }}</span>
                    </div>

                    <div class="transaction-list">
                        @forelse(array_reverse($transactions) as $transaction)
                            @php
                                $selectedCategory = collect($categories)->firstWhere('key', $transaction['category']);
                                $icon = $selectedCategory['icon'] ?? '✨';
                            @endphp

                            <div class="transaction">
                                <div class="cat-icon">{{ $icon }}</div>

                                <div>
                                    <h3>{{ $transaction['title'] }}</h3>
                                    <p>{{ $transaction['date_label'] }} · {{ $transaction['account'] }}</p>
                                </div>

                                <div class="transaction-right">
                                    <div class="transaction-amount {{ $transaction['type'] === 'income' ? 'green' : 'red' }}">
                                        {{ $transaction['type'] === 'income' ? '+' : '-' }}${{ number_format($transaction['amount'], 2) }}
                                    </div>

                                    <form method="POST" action="/transaction/delete">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $transaction['id'] }}">
                                        <button class="btn btn-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p style="color: var(--muted);">Belum ada transaksi.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </section>

    </main>
</div>

<a href="#add" class="fab">✏️</a>

<nav class="mobile-bottom">
    <div class="bottom-item active">
        <span>📖</span>
        Buku
    </div>
    <div class="bottom-item">
        <span>👛</span>
        Dompet
    </div>
    <div class="bottom-item">
        <span>🍩</span>
        Analisis
    </div>
    <div class="bottom-item">
        <span>⋯</span>
        Lebih
    </div>
</nav>

</body>
</html>
