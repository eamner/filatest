<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use Filament\Forms;
use App\Filament\Resources\EmpresaResource;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;

class EditEmpresa extends EditRecord
{
    use EditRecord\Concerns\HasWizard;

    protected static string $resource = EmpresaResource::class;

    protected function getSteps(): array
    {

        return [
            Forms\Components\Wizard\Step::make('1- Datos Generales')
                ->schema([
                    Forms\Components\TextInput::make('rif')->required(),
                    Forms\Components\TextInput::make('name')->label(__('Nombre de la Empresa'))->required(),
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
                    //->reactive()
                    //->afterStateUpdated(fn (callable $set) => $set('id', null)),

                    /*Forms\Components\BelongsToSelect::make('state_id')
                        ->relationship('state', 'state_name')
                        ->options(function (callable $get) {
                            $city = State::find($get('id'));

                            if (!$city) {
                                return State::all()->pluck('state_name', 'id')->toArray();
                            }

                            return $city->state->pluck('state_name', 'id');
                        }),*/

                    //Fieldset::make('Dirección')->schema([
                    //Forms\Components\TextInput::make('calle'),
                    //Forms\Components\TextInput::make('ciudad'),
                    //Forms\Components\TextInput::make('estado'),
                    //Forms\Components\TextInput::make('pais'),
                    /*Select::make('id')
                            ->searchable()

                            ->getSearchResultsUsing(fn (string $searchQuery) => City::where('city_name', 'like', "%{$searchQuery}%")->limit(50)->pluck('city_name', 'id'))
                            ->getOptionLabelUsing(fn ($value): ?string => City::find($value)?->name),*/
                    /*Select::make('state_name')
                            ->searchable()
                            ->getSearchResultsUsing(fn (string $searchQuery) => State::where('state_name', 'like', "%{$searchQuery}%")->limit(50)->pluck('state_name', 'id'))
                            ->getOptionLabelUsing(fn ($value): ?string => State::find($value)?->name),]),*/
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
