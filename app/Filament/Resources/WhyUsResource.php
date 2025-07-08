<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyUsResource\Pages;
use App\Filament\Resources\WhyUsResource\RelationManagers;
use App\Models\WhyUs;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Icon;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhyUsResource extends Resource
{
    protected static ?string $model = WhyUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('title')
            ->label('Judul')
            ->required()
            ->maxLength(255),
            Forms\Components\RichEditor::make('desc')->columnSpan(2)->required(),
            Forms\Components\Select::make('icon')
            ->label('Icon')
            ->options(Icon::pluck('icon')->toArray())
            ->searchable()
            ->required(),
            Forms\Components\TextInput::make('color')
            ->label('Warna')
            ->required()
            ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable(),
                Tables\Columns\TextColumn::make('desc')->label('Deskripsi')->limit(50),
                Tables\Columns\TextColumn::make('icon')->label('Icon')->searchable(),
                Tables\Columns\TextColumn::make('color')->label('Warna')->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListWhyUs::route('/'),
            'create' => Pages\CreateWhyUs::route('/create'),
            'edit' => Pages\EditWhyUs::route('/{record}/edit'),
        ];
    }
}
