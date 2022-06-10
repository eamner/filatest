<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpresaResource\Pages;
use App\Filament\Resources\EmpresaResource\RelationManagers;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Fieldset;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'name';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rif')->required(),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('ano_fund'),
                Forms\Components\TextInput::make('phone'),
                /*Fieldset::make('Label')->schema([
                    Forms\Components\TextInput::make('calle'),
                    Forms\Components\TextInput::make('ciudad'),
                    Forms\Components\TextInput::make('estado'),
                    Forms\Components\TextInput::make('pais'),
                ]),*/
                Forms\Components\TextInput::make('city_id'),
                Forms\Components\TextInput::make('website')->url(),
                Forms\Components\TextInput::make('linkedin_profile'),
                Forms\Components\TextInput::make('twitter_profile'),
                Forms\Components\TextInput::make('instagram_profile'),
                Forms\Components\TextInput::make('facebook_profile'),
                Forms\Components\TextInput::make('youtube_profile'),
                Forms\Components\BelongsToSelect::make('city_id')
                    ->relationship('cities', 'city_name')
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        static $max = 2155;

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rif'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('ano_fund'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('website'),
                Tables\Columns\TextColumn::make('linkedin_profile'),
                Tables\Columns\TextColumn::make('twitter_profile'),
                Tables\Columns\TextColumn::make('instagram_profile'),
                Tables\Columns\TextColumn::make('facebook_profile'),
                Tables\Columns\TextColumn::make('youtube_profile'),

            ])
            ->filters([
                //
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
            'index' => Pages\ListEmpresas::route('/'),
            'create' => Pages\CreateEmpresa::route('/create'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }
}
