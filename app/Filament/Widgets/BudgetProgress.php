<?php

namespace App\Filament\Widgets;

use App\Models\Budget;
use App\Models\Expense;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BudgetProgress extends BaseWidget
{
    protected function getStats(): array
    {
        $budget = Budget::first();
        $totalExpense = Expense::sum('amount');

        if (!$budget) {
            return [
                Stat::make('Budget Belum Diatur', 'Rp 0')
                    ->description('Isi data di menu Budgets dulu ya!')
                    ->color('warning'),
            ];
        }
        $persentase = ($totalExpense / $budget->amount) * 100;
        $sisa = $budget->amount - $totalExpense;

        return [
            Stat::make('Progress Budget Kamu', round($persentase) . '%')
                ->description($sisa < 0 ? 'Waduh, jatah jajan udah bocor!' : 'Sisa jatah: Rp ' . number_format($sisa, 0, ',', '.'))
                ->descriptionIcon($persentase > 80 ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-circle')
                ->color($persentase > 90 ? 'danger' : ($persentase > 70 ? 'warning' : 'success'))
                ->chart([$totalExpense, $budget->amount]),
        ];
    }
}
