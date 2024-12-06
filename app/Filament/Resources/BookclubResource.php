<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookclubResource\Pages;
use App\Filament\Resources\BookclubResource\RelationManagers;
use App\Models\Bookclub;
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
use \App\Models\User;

class BookclubResource extends Resource
{
    protected static ?string $model = Bookclub::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                Textarea::make('description'),
                Select::make('users')
                    ->multiple()
                    ->relationship(titleAttribute: 'name')
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->searchable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title'),
                TextColumn::make('description')->label('Description'),
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
            'index' => Pages\ListBookclubs::route('/'),
            'create' => Pages\CreateBookclub::route('/create'),
            'edit' => Pages\EditBookclub::route('/{record}/edit'),
        ];
    }
}
