<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MisiResource\Pages;
use App\Models\Misi;
use App\Models\Icon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class MisiResource extends Resource
{
    protected static ?string $model = Misi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([


            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->columnSpan(2)
                ->maxLength(255),
            FileUpload::make('image')
                ->label('Gambar Utama')
                ->image()
                ->directory('misis')
                ->columnSpan(2)
                ->required(),
            Repeater::make('data')
                ->label('Daftar Misi')
                ->schema([
                    TextInput::make('title')
                        ->label('Judul Misi')
                        ->required()
                        ->columnSpan(2)
                        ->maxLength(255),

                    Textarea::make('desc')
                        ->label('Deskripsi Misi')
                        ->rows(3)
                        ->columnSpan(2)
                        ->required(),

                    Select::make('icon')
                        ->label('Icon (class FontAwesome)')
                        ->options(Icon::pluck('icon', 'icon')->toArray())
                        ->searchable()
                        ->required(),
                    TextInput::make('color')
                        ->label('Warna')
                        ->required()
                        ->maxLength(255),
                ])
                ->columns(2)
                ->columnSpan(2)
                ->addActionLabel('Tambah Misi')
                ->reorderable()
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

            TextColumn::make('title')
                ->label('Judul')
                ->searchable()
                ->limit(30),

            TextColumn::make('data')
                ->label('Jumlah Misi')
                ->getStateUsing(fn ($record) => is_array($record->data) ? count($record->data) . ' item' : 0),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMisis::route('/'),
            'create' => Pages\CreateMisi::route('/create'),
            'edit' => Pages\EditMisi::route('/{record}/edit'),
        ];
    }
}
