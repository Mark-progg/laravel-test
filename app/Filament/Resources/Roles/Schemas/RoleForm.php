<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                    
                TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Отображаемое имя роли (например: Admin, Manager)'),
                    
                Select::make('color')
                    ->options([
                        'gray' => 'Gray',
                        'red' => 'Red',
                        'green' => 'Green',
                        'blue' => 'Blue',
                    ])
                    ->default('gray')
                    ->required(),
            ]);
    }
}
