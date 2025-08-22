<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->schema([
                        RichEditor::make('content')
                            ->columnSpan(8)
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('images'),
                        Group::make([
                            TextInput::make('title'),
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('images'),
                            Radio::make('publish_status')
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Published'
                                ])
                                ->default('draft'),
                        ])
                            ->columnSpan(4)
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
