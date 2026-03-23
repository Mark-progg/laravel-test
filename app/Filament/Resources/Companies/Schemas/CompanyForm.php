<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('inn')
                    ->required()
                    ->maxLength(255)
                    ->label('INN'),
                    
                Select::make('users')
                    ->relationship('users', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Users'),
            ]);
    }
}
