<?php

use App\Models\Budget;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $budget = Budget::latest()->first();
    $totalBudgetValue = $budget ? $budget->amount : 0;
    $totalExpense = Expense::sum('amount');
    $sisaBudget = $totalBudgetValue - $totalExpense;
    $recentExpenses = Expense::with('category') // Pastikan ada with('category')
    ->orderBy('date', 'desc')
    ->limit(3)
    ->get();
    $hour = date('H');
    if ($hour < 12) $greeting = 'Pagi';
    elseif ($hour < 15) $greeting = 'Siang';
    elseif ($hour < 18) $greeting = 'Sore';
    else $greeting = 'Malam';

    return view('welcome', [
        'sisa' => $sisaBudget,
        'total' => $totalExpense,
        'budget' => $totalBudgetValue,
        'recentExpenses' => $recentExpenses,
        'greeting' => $greeting,
        'tanggal' => date('d F Y')
    ]);
});
