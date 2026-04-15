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
        $jam = date('H');
        if ($jam < 12) {
            $salam = 'Selamat Pagi, Aiseukriem! ✨';
        } elseif ($jam < 18) {
            $salam = 'Selamat Siang, jangan lupa catat jajan ya! 🥯';
        } else {
            $salam = 'Selamat Malam, cek pengeluaran hari ini yuk! 🌙';
    }
    $totalBudget = \App\Models\Budget::sum('amount');
    $totalExpense = \App\Models\Expense::sum('amount');
    $selisih = $totalBudget - $totalExpense;

    return [
        Stat::make($salam, 'Ready for Glow Up?')
                ->description('Jangan lupa bahagia hari ini!')
                ->color('primary'),
        Stat::make('Sisa Jatah Jajan', 'Rp ' . number_format($selisih, 0, ',', '.'))
            ->description($selisih < 0 ? 'Waduh, jatah kamu minus!' : 'Masih aman, Bestie!')
            ->descriptionIcon($selisih < 0 ? 'heroicon-m-face-frown' : 'heroicon-m-face-smile')
            ->color($selisih < 0 ? 'danger' : 'success'),
        Stat::make('Total Pengeluaran', 'Rp ' . number_format($totalExpense, 0, ',', '.'))
            ->description('Uang yang sudah terpakai')
            ->descriptionIcon('heroicon-m-shopping-cart')
            ->color('warning'),
        Stat::make('Persentase Boros', ($totalBudget > 0 ? round(($totalExpense / $totalBudget) * 100) : 0) . '%')
            ->description('Dari total budget kamu')
            ->descriptionIcon('heroicon-m-chart-bar')
            ->color('info'),
    ];
    }
}
