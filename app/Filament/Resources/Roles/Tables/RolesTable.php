<?php

namespace App\Filament\Resources\Roles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class RolesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('color')
                    ->badge()
                    ->color(fn ($record) => match ($record?->color) {
                        'red' => 'danger',
                        'yellow' => 'warning',
                        'green' => 'success',
                        'gray' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                    
                TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Users')
                    ->sortable(),
                    
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('color')
                    ->options([
                        'gray' => 'Gray',
                        'red' => 'Red',
                        'green' => 'Green',
                        'yellow' => 'Yellow',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
