<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class ExpenseCalendarWidget extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Expense::query()
            ->get()
            ->map(fn (Expense $expense) => [
                'id' => $expense->getKey(),
                'title' => 'Rp ' . number_format($expense->amount, 0, ',', '.'),
                'start' => $expense->date,
                'color' => $expense->amount > 100000 ? '#FFB7B2' : '#B7CFB7',
            ])
            ->toArray();
    }
}
