<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ExpenseChart extends ChartWidget
{
    protected static ?string $heading = 'Alokasi Jajan (By Category)';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $categories = Category::all();
        $data = [];
        $labels = [];

        foreach ($categories as $category) {
            $total = Expense::where('category_id', $category->id)->sum('amount');
            $data[] = $total;
            $labels[] = $category->name;
        }
        return [
            'datasets' => [
                [
                    'label' => 'Total Pengeluaran',
                    'data' => $data,
                    'backgroundColor' => [
                        '#FFADAD', '#FFD6A5', '#FDFFB6', '#CAFFBF', '#9BF6FF', '#A0C4FF', '#BDB2FF', '#FFC6FF'
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
