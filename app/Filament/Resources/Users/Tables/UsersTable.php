<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                    
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('role.name')
                    ->label('Role')
                    ->badge()
                    ->color(fn ($record) => match ($record?->role?->name) {
                        'admin' => 'danger',
                        'manager' => 'warning',
                        'user' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                
                TextColumn::make('role.color')
                    ->label('Role color')
                    ->badge()
                    ->color(fn ($record) => $record?->role?->color ?? 'gray')
                    ->sortable(),
                    
                TextColumn::make('companies_count')
                    ->counts('companies')
                    ->label('Companies')
                    ->sortable(),
                    
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->relationship('role', 'name')
                    ->label('Filter by Role'),
                    
                SelectFilter::make('company')
                    ->relationship('companies', 'name')
                    ->label('Filter by Company'),
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
