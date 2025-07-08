<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use App\Models\Icon; // pastikan kamu punya model Icon
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            FileUpload::make('image')
                ->label('Gambar')
                ->image()
                ->directory('contacts')
                ->columnSpan(2)
                ->required(),

            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255),
            TextInput::make('address')
                ->label('Alamat')
                ->required()
                ->maxLength(255),

            RichEditor::make('subtitle')
                ->label('Deskripsi')
                ->columnSpan(2)
                ->required(),


            Repeater::make('social_media')
                ->label('Social Media')
                ->schema([
                    Select::make('icon')
                        ->label('Icon')
                        ->options(Icon::pluck('icon', 'icon')->toArray())
                        ->searchable()
                        ->required(),

                    TextInput::make('name')
                        ->label('Nama akun / link')
                        ->required(),
                ])
                ->addActionLabel('Tambah Social Media')
                ->reorderable()
                ->columnSpan(2)
                ->columns(2),
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

            TextColumn::make('subtitle')->label('Deskripsi')->limit(50), // perbaikan: sebelumnya tertulis 'desc', padahal kamu pakai 'subtitle'
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
