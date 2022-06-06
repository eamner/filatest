<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use Filament\Forms;
use App\Filament\Resources\EmpresaResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Wizard;

class CreateEmpresa extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = EmpresaResource::class;

    protected function getSteps(): array
    {
        return [
            Wizard\Step::make('1 - Datos Generales')
                ->schema([
                    Forms\Components\TextInput::make('rif')->required(),
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('ano_fund'),
                    Forms\Components\TextInput::make('phone'),
                ]),
            Wizard\Step::make('Datos 2')
                ->schema([
                    Forms\Components\TextInput::make('website')->url(),
                    Forms\Components\TextInput::make('address'),
                ]),
            Wizard\Step::make('Datos 3')
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
