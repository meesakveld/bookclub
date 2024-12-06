<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookclubPostResource\Pages;
use App\Filament\Resources\BookclubPostResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Inputs
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

// Columns
use Filament\Tables\Columns\TextColumn;

// Models
use App\Models\Bookclub;
use App\Models\BookclubPost;
use App\Models\User;
use App\Models\Book;

class BookclubPostResource extends Resource
{
    protected static ?string $model = BookclubPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('content'),
                Select::make('bookclub_id')
                    ->label('Bookclub')
                    ->relationship()
                    ->options(Bookclub::all()->pluck('title', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Select::make('user_id')
                    ->label('User')
                    ->relationship()
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->required()
                    ->searchable(),
                Select::make('book_id')
                    ->label('Book')
                    ->relationship()
                    ->options(Book::all()->pluck('title', 'id')->toArray())
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content')->label('Content'),
                TextColumn::make('bookclub.title')->label('Bookclub'),
                TextColumn::make('user.name')->label('User'),
                TextColumn::make('book.title')->label('Book'),
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
            'index' => Pages\ListBookclubPosts::route('/'),
            'create' => Pages\CreateBookclubPost::route('/create'),
            'edit' => Pages\EditBookclubPost::route('/{record}/edit'),
        ];
    }
}
