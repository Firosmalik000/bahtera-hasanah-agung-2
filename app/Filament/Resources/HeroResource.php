<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Filament\Resources\HeroResource\RelationManagers;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\FileUpload::make('image')
            ->label('Gambar')
            ->image()
            ->directory('heroes')
            ->columnSpan(2)
            ->required(),
        TextInput::make('title')
            ->label('Judul')
            ->required()
            ->maxLength(255),
        Textarea::make('desc')
            ->label('Deskripsi')
            ->rows(4)
            ->required(),
    ]);
}

public static function table(Table $table): Table
{
    return $table->columns([
        ImageColumn::make('image')
        ->label('Gambar')
        ->disk('public')
        ->defaultImageUrl('https://placehold.co/100x100?text=No+Image')
        ->circular(),
        TextColumn::make('title')->label('Judul')->searchable(),
        TextColumn::make('desc')->label('Deskripsi')->limit(50),
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
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
