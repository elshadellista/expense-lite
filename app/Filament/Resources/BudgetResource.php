<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetResource\Pages;
use App\Filament\Resources\BudgetResource\RelationManagers;
use App\Models\Budget;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes' ;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            \Filament\Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            \Filament\Forms\Components\TextInput::make('amount')
                ->numeric()
                ->prefix('Rp ')
                ->required(),
            \Filament\Forms\Components\TextInput::make('period')
                ->placeholder('Contoh: April 2026')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            \Filament\Tables\Columns\TextColumn::make('category.name')
                ->label('Kategori'),
            \Filament\Tables\Columns\TextColumn::make('amount')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                ->label('Target Budget'),
            \Filament\Tables\Columns\TextColumn::make('period')
                ->label('Periode'),
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
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }
}
