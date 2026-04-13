<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Expense;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
    $totalBudget = \App\Models\Budget::sum('amount');
    $totalExpense = \App\Models\Expense::sum('amount');
    $selisih = $totalBudget - $totalExpense;

    return [
        \Filament\Widgets\StatsOverviewWidget\Stat::make('Sisa Jatah Jajan', 'Rp ' . number_format($selisih, 0, ',', '.'))
            ->description($selisih < 0 ? 'Waduh, jatah kamu minus!' : 'Masih aman, Bestie!')
            ->descriptionIcon($selisih < 0 ? 'heroicon-m-face-frown' : 'heroicon-m-face-smile')
            ->color($selisih < 0 ? 'danger' : 'success'),
        \Filament\Widgets\StatsOverviewWidget\Stat::make('Total Pengeluaran', 'Rp ' . number_format($totalExpense, 0, ',', '.'))
            ->description('Uang yang sudah terpakai')
            ->descriptionIcon('heroicon-m-shopping-cart')
            ->color('warning'),
        \Filament\Widgets\StatsOverviewWidget\Stat::make('Persentase Boros', ($totalBudget > 0 ? round(($totalExpense / $totalBudget) * 100) : 0) . '%')
            ->description('Dari total budget kamu')
            ->descriptionIcon('heroicon-m-chart-bar')
            ->color('info'),
    ];
    }
}
