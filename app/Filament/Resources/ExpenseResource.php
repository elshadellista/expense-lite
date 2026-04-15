<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->label('Kategori'),
                \Filament\Forms\Components\TextInput::make('name')
                ->required()
                ->label('Nama Barang/Jajan'),
            \Filament\Forms\Components\TextInput::make('amount')
                ->numeric()
                ->prefix('Rp')
                ->placeholder('Contoh: 50000')
                ->helperText('Input jumlah uang yang kamu keluarkan ya!')
                ->required()
                ->label('Nominal'),
            \Filament\Forms\Components\DatePicker::make('date')
                ->default(now())
                ->required()
                ->label('Tanggal'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum ada catatan jajan nih 💸')
            ->emptyStateDescription('Ayo mulai catat pengeluaranmu biar ga boncos!')
            ->emptyStateIcon('heroicon-o-face-frown')
            ->defaultSort('date', 'desc')
            ->columns([
            \Filament\Tables\Columns\TextColumn::make('category.name')
                ->label('Kategori'),
            \Filament\Tables\Columns\TextColumn::make('name')
                ->label('Nama Barang'),
            \Filament\Tables\Columns\TextColumn::make('amount')
                ->label('Nominal')
                ->numeric(
                    decimalPlaces: 0,
                    thousandsSeparator: '.',
                    )
                ->prefix('Rp ')
                ->sortable()
                ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Total Semua'))
                ->color(fn ($state) => $state > 100000 ? 'danger' : 'success')
                ->weight('bold'),
            \Filament\Tables\Columns\TextColumn::make('date')
                ->date()
                ->label('Tanggal'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
