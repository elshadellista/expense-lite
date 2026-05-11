<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ExpenseTrendChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = \App\Models\Expense::query()
        ->where('date', '>=', now()->subDays(6))
        ->orderBy('date')
        ->get()
        ->groupBy('date');

    $amounts = [];
    $labels = [];

    foreach ($data as $date => $expenses) {
        $labels[] = \Carbon\Carbon::parse($date)->format('d M');
        $amounts[] = $expenses->sum('amount');
    }

    return [
        'datasets' => [
            [
                'label' => 'Tren Jajan Harian',
                'data' => $amounts,
                'borderColor' => '#FFB7B2', 
                'fill' => 'start',
                'backgroundColor' => 'rgba(255, 183, 178, 0.2)',
            ],
        ],
        'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
