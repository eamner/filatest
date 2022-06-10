<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use Filament\Forms;
use App\Filament\Resources\EmpresaResource;
use App\Models\City;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;

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
                    Forms\Components\TextInput::make('ano_fund')->numeric()->minValue(1901)->maxValue(2150)->label('Año de Fundación'),
                    Fieldset::make('Dirección')->schema([
                        Forms\Components\TextInput::make('phone')->tel()->label('Teléfono'),
                        Forms\Components\TextInput::make('street')->maxLength(100),
                        //Forms\Components\TextInput::make('ciudad'),
                        //Forms\Components\TextInput::make('estado'),
                        //Forms\Components\TextInput::make('pais'),
                        Select::make('id')
                            ->label('Ciudad')
                            ->searchable()
                            ->getSearchResultsUsing(fn (string $searchQuery) => City::where('city_name', 'like', "%{$searchQuery}%")->limit(50)->pluck('city_name', 'id'))
                            ->getOptionLabelUsing(fn ($value): ?string => City::find($value)?->name),

                    ]),
                ]),
            Wizard\Step::make('Datos 2')
                ->schema([
                    Forms\Components\TextInput::make('website')->url(),
                    //Forms\Components\TextInput::make('address'),
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
