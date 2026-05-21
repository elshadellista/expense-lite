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
    $recentExpenses = Expense::with('category')
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
    ->get()
    ->groupBy('date');
    $goals = \App\Models\Goal::all();

    return view('welcome', [
        'sisa' => $sisaBudget,
        'total' => $totalExpense,
        'budget' => $totalBudgetValue,
        'recentExpenses' => $recentExpenses,
        'greeting' => $greeting,
        'tanggal' => date('d F Y'),
        'categories' => $categories,
        'expensesByDate' => $expensesByDate,
        'goals' => $goals,
        'status' => $status,
    ]);
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
