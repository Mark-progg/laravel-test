<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                    
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => 
                        filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255)
                    ->minLenght(8),
                    
                Select::make('role_id')
                    ->relationship('role', 'name')
                    ->label('Role')
                    ->searchable()
                    ->preload(),
                    
                Select::make('companies')
                    ->relationship('companies', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Companies'),
            ]);
    }
}
