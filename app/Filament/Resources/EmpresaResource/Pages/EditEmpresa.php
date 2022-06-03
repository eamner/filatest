<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use Filament\Forms;
use App\Filament\Resources\EmpresaResource;
use Filament\Resources\Pages\EditRecord;

class EditEmpresa extends EditRecord
{
    use EditRecord\Concerns\HasWizard;

    protected static string $resource = EmpresaResource::class;

    protected function getSteps(): array
    {
        return [
            Forms\Components\Wizard\Step::make('Datos 1')
                ->schema([
                    Forms\Components\TextInput::make('rif')->required(),
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('phone'),
                ]),
            Forms\Components\Wizard\Step::make('Datos 2')
                ->schema([
                    Forms\Components\TextInput::make('website')->url(),
                    Forms\Components\TextInput::make('address'),
                ]),
            Forms\Components\Wizard\Step::make('Datos 3')
                ->schema([
                    Forms\Components\TextInput::make('linkedin_profile'),
                    Forms\Components\TextInput::make('twitter_profile'),
                    Forms\Components\TextInput::make('instagram_profile'),
                    Forms\Components\TextInput::make('facebook_profile'),
                    Forms\Components\TextInput::make('youtube_profile'),
                ]),
        ];
    }
}
