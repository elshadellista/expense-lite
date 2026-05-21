<?php

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $budget = Budget::latest()->first();
    $totalBudgetValue = $budget ? $budget->amount : 0;
    $totalExpense = Expense::sum('amount');

    $sisaBudget = $totalBudgetValue - $totalExpense;

    $sisa = $sisaBudget;

    $hariIni = \Carbon\Carbon::now();
    $akhirBulan = \Carbon\Carbon::now()->endOfMonth();
    $sisaHari = $hariIni->diffInDays($akhirBulan) ?: 1;

    $jatahHarian = $sisaBudget / $sisaHari;

    $categoryId = request('category_id');

    $recentExpenses = Expense::with('category')
        ->when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })
        ->orderBy('date', 'desc')
        ->limit(3)
        ->get();

    $categories = Category::with('expenses')->get();
    $status = $sisaBudget > 0 ? "Masih bisa jajan kopi, Bestie! ☕" : "Mode hemat aktif, stop jajan dulu! 🛑";

    $hour = date('H');
    if ($hour < 12) $greeting = 'Pagi';
    elseif ($hour < 15) $greeting = 'Siang';
    elseif ($hour < 18) $greeting = 'Sore';
    else $greeting = 'Malam';

    $expensesByDate = Expense::whereMonth('date', date('m'))
        ->whereYear('date', date('Y'))
        ->when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })
        ->get()
        ->groupBy('date');
    $goals = \App\Models\Goal::all();

    if ($goals->isEmpty()) {
        $totalSavedAmount = 1200000;
        $totalGoalsCount = 5;
        $achievedGoalsCount = 3;
    } else {
        $totalSavedAmount = \App\Models\Goal::sum('saved_amount');
        $totalGoalsCount = $goals->count();
        $achievedGoalsCount = $goals->filter(function ($goal) {
            return $goal->saved_amount >= $goal->price;
        })->count();
    }

    if ($totalBudgetValue > 0) {
        $efficiencyPercentage = round(($sisaBudget / $totalBudgetValue) * 100);
        $efficiencyPercentage = max(0, min(100, $efficiencyPercentage));
    } else {
        $efficiencyPercentage = 100;
    }

    $circleDashOffset = 314.15 - (314.15 * $efficiencyPercentage / 100);

    return view('welcome', compact(
        'budget', 'totalBudgetValue', 'totalExpense', 'sisaBudget', 'sisa',
        'recentExpenses', 'categories', 'status', 'greeting',
        'expensesByDate', 'goals', 'jatahHarian', 'categoryId',
        'totalSavedAmount', 'totalGoalsCount', 'achievedGoalsCount', 'efficiencyPercentage',
        'efficiencyPercentage', 'circleDashOffset'
    ));
});

Route::post('/add-expense', function (Request $request) {
    Expense::create([
        'name'         => $request->description ?? 'Jajan',
        'category_id' => $request->category_id,
        'amount' => $request->amount,
        'date' => now(),
        'description' => $request->description,
    ]);

    return redirect('/')->with('success', 'Jajan berhasil dicatat! 🐾');
});

Route::post('/edit-expense/{id}', function (Illuminate\Http\Request $request, $id) {
    $expense = \App\Models\Expense::findOrFail($id);
    $expense->update([
        'name'        => $request->description ?? 'Jajan Rutin',
        'category_id' => $request->category_id,
        'amount'      => $request->amount,
        'date'        => now(),
        'description' => $request->description,
    ]);
    return redirect('/')->with('success', 'Data jajan berhasil diupdate! 🐾');
});
